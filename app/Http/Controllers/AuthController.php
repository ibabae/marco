<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreAuthRequest;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\ClientRepository;

class AuthController extends Controller
{
    public function __construct(
        protected SmsService $smsService,
    ){}

    /**
     *
     * @OA\Info(
     *      version="1.0.0",
     *      title="Marco Api Document",
     *      description="This is the API documentation for our project.",
     *      @OA\Contact(
     *          email="alibabaeian670@gmail.com"
     *      )
     * )
     * @OA\Post(
     *      path="/api/login",
     *      summary="Login user",
     *      tags={"Auth"},
     *      description="Login user with phone number and code",
     *      @OA\Parameter(
     *          name="phone",
     *          in="query",
     *          description="Login with phone number",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="code",
     *          in="query",
     *          description="Verification code",
     *          required=false,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful login",
     *         @OA\JsonContent(
     *             @OA\Property(property="token", type="string"),
     *             @OA\Property(property="client_id", type="integer"),
     *             @OA\Property(property="client_secret", type="string")
     *         )
     *      ),
     *      @OA\Response(
     *          response=203,
     *          description="Verification code error",
     *      )
     * )
     * @OA\SecurityScheme(
     *     type="http",
     *     description="Use Passport bearer token to access protected endpoints",
     *     name="Authorization",
     *     in="header",
     *     scheme="bearer",
     *     bearerFormat="JWT",
     *     securityScheme="passport",
     * )
     */

    public function store(StoreAuthRequest $request): JsonResponse
    {
        if ($request->code) {
            if ($this->smsService->check($request->phone, $request->code)) {
                $user = User::firstOrCreate(
                    [
                        'phone' => $request->phone,
                    ],
                    [
                        'password' => Hash::make($request->password),
                    ]
                );
                $credentials = $request->only('phone', 'password');
                if (Auth::attempt($credentials, true)) {

                    $clientRepository = new ClientRepository();
                    $client = $clientRepository->createPersonalAccessClient(
                        $user->id,
                        $user->name . ' Personal Access Client',
                        ''
                    );
                    $client->makeVisible(['secret']);

                    $token = $user->createToken(env('APP_NAME'))->accessToken;
                    $user->syncRoles(['user']);
                    return response()->json([
                        'token' => $token,
                        'client_id' => $client->id,
                        'client_secret' => $client->secret,
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'errors' => [
                        'code' => 'کد وارد شده اشتباه است'
                    ],
                ], 203);
            }
        } else {
            $send = $this->smsService->send($request->phone);
            return response()->json([
                'data' => [
                    'phone' => $request->phone,
                    'time' => $send['time'],
                    'code' => env('APP_DEBUG') ? $send['code'] : null
                ],
            ], 202);
        }
        return response()->json();
    }
}
