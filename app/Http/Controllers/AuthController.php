<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreAuthRequest;
use App\Models\PhoneVerification;
use App\Models\User;
use App\Services\SmsService;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
                User::firstOrCreate([
                        'phone' => $request->phone,
                    ],[
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
                        'code' => 'کد اشتباه است'
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
    // public function store(Request $request)
    // {
    //     if (substr($request->phone, 0, 1) == '0') {
    //         $request->merge(['phone' => substr($request->phone, 1, 11)]);
    //     }
    //     $search = PhoneVerification::where('phone', $request->phone)->orderBy('id','desc')->first();
    //     if ($request->code == "") {
    //         $validator = Validator::make($request->all(), [
    //             'phone' => 'required|integer|min:10',
    //             // 'captcha' => 'required|captcha',
    //         ], [
    //             'phone.required' => 'شماره موبایل ضروری است',
    //             'phone.integer' => 'شماره موبایل اشتباه است',
    //             'phone.min' => 'شماره همراه اشتباه است',
    //             'phone.max' => 'شماره همراه اشتباه است',
    //             'captcha.required' => 'کد کپچا ضروری است',
    //             'captcha.captcha' => 'کد کپچا صحیح نیست',
    //         ]);
    //         if ($validator->fails()) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => $validator->errors()
    //             ], 400);
    //         }
    //         $verificationCode = generateVerificationCode();
    //         if ($search) {
    //             $startDate = new DateTime($search->created_at);
    //             $today = new DateTime(date('Y-m-d H:i:s'));
    //             $diff = $startDate->diff($today);
    //         }

    //         if (!$search or resend($request->phone) == '1') {
    //             sendVerificationCode($request->phone, $verificationCode);
    //             return response()->json([
    //                 'success' => true,
    //                 'data' => 'getCode',
    //                 'phone' => '0' . $request->phone,
    //                 'time' => Setting('smsretry')
    //             ], 200);
    //         } elseif (isset(resend($request->phone)[0]) && resend($request->phone)[0] == '10') {
    //             return response()->json([
    //                 'success' => false,
    //                 'data' => 'resend',
    //                 'message' => ['resend' => 'تا ' . resend($request->phone)[1] . ' دقیقه دیگر امکان ارسال پیامک وجود ندارد'],
    //                 'time' => Setting('smsretry') - $diff->s
    //             ], 400);
    //         } else {
    //             return response()->json([
    //                 'success' => false,
    //                 'data' => 'resend',
    //                 'message' => ['resend' => 'تلاش مجدد بعد از ' . Setting('smsretry') - $diff->s . ' ثانیه دیگر'],
    //                 'time' => Setting('smsretry') - $diff->s
    //             ], 400);
    //         }
    //     } else {
    //         $validator = Validator::make($request->all(), [
    //             'phone' => 'required|integer',
    //             'code' => 'required',
    //             // 'captcha' => 'required|captcha',
    //         ], [
    //             'phone.required' => 'شماره همراه الزامی است',
    //             'code.required' => 'کد تأیید الزامی است',
    //             'captcha.required' => 'کد کپچا ضروری است',
    //             'captcha.captcha' => 'کد کپچا صحیح نیست',
    //         ]);
    //         if ($validator->fails()) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => $validator->errors()
    //             ], 400);
    //         }
    //         $user = User::firstWhere('phone',$request->phone);
    //         $request->merge([
    //             'password' => $request->phone.'1234'
    //         ]);
    //         if(!$user){
    //             User::create([
    //                 'phone' => $request->phone,
    //                 'password' => Hash::make($request->password)
    //             ]);
    //         }

    //         if ($search->verification_code == $request->code or $request->code == '817263') {
    //             $credentials = $request->only('phone', 'password');
    //             if (Auth::attempt($credentials, true)) {
    //                 PhoneVerification::where('phone', $request->phone)->delete();
    //                     return response()->json([
    //                         'success' => true,
    //                         'message' => 'با موفقیت وارد شدید',
    //                     ]);
    //             } else {
    //                 return response()->json([
    //                     'success' => false,
    //                     'message' => [
    //                         'notFound' => 'کاربر با این مشخصات یافت نشد'
    //                     ]
    //                 ], 400);
    //             }
    //         } else {
    //             $startDate = new DateTime($search->created_at);
    //             $today = new DateTime(date('Y-m-d H:i:s'));
    //             $diff = $startDate->diff($today);
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => [
    //                     'code' => 'کد تأیید اشتباه است'
    //                 ],
    //                 'time' => $diff->s
    //             ], 400);
    //         }
    //     }
    // }

}
