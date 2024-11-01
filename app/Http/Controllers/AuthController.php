<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreAuthRequest;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function __construct(
        protected SmsService $smsService,
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'ورود / ثبت نام';
        return view('website.auth',compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthRequest $request)
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
                    'message' => [
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
