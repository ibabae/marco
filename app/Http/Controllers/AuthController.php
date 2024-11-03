<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreAuthRequest;
use App\Models\PhoneVerification;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\ClientRepository;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct(
        protected SmsService $smsService,
    ){}

    /**
     * @OA\Post(
     *      path="/api/login",
     *      @OA\Response(response="200", description="Post login data"),
     *      @OA\Parameter(
     *          name="phone",
     *          in="path",
     *          description="Login with phone number",
     *          required=true,
     *      ),
     *  )
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     *
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
                if($user->id == 1){
                    $user->update(['role'=>1]);
                }
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
            return response()->json([
                'data' => [
                    'phone' => "0{$request->phone}",
                    'time' => $this->smsService->send($request->phone)['time'],
                ],
            ], 202);
        }
        return response()->json();
    }


}
