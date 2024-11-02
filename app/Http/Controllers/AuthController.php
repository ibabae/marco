<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreAuthRequest;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\View\Factory;

/**
 * @package app\http\controllers
 *
 * @OA\Info(title="Authentication", version="1.0")
 *
 */

class AuthController extends Controller
{

    public function __construct(
        protected SmsService $smsService,
    ){}

    /**
     * @OA\Get(
     *     path="/login",
     *     @OA\Response(response="200", description="Get login page"),
     * )
     * @return Factory|View
     *
     */
    public function index(): Factory|View
    {
        $title = 'ورود / ثبت نام';
        return view('website.auth',compact(['title']));
    }

    /**
     * @OA\Post(
     *      path="/login",
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
                User::firstOrCreate(
                    [
                        'phone' => $request->phone,
                    ],
                    [
                        'password' => Hash::make($request->password),
                    ]
                );
                $credentials = $request->only('phone', 'password');
                if (Auth::attempt($credentials, true)) {
                    return response()->json([
                        'success' => true,
                        'message' => 'با موفقیت وارد شدید',
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'errors' => [
                        'code' => 'کد وارد شده اشتباه است'
                    ],
                ], 400);
            }
        } else {
            return response()->json([
                'success' => true,
                'data' => [
                    'phone' => "0{$request->phone}",
                    'time' => $this->smsService->send($request->phone)['time'],
                ],
            ]);
        }
    }

}
