<?php

namespace Tests\Feature;

use App\Models\PhoneVerification;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class AuthTest extends TestCase
{
    // RefreshDatabase
    use DatabaseMigrations;

    #[Test]
    public function user_can_register_and_get_token_with_correct_code()
    {
        // شماره تلفن و کد
        $phone = '9123456789';
        $code = '123456';

        // ارسال درخواست برای ارسال کد
        $response = $this->postJson(route('login.store'), [
            'phone' => $phone,
        ]);

        $storedCode = PhoneVerification::where('phone', $phone)->first()->code;

        // بررسی که وضعیت پاسخ 202 باشد
        $response->assertStatus(202);

        // ارسال درخواست برای ثبت‌نام با کد صحیح
        $response = $this->postJson(route('login.store'), [
            'phone' => $phone,
            'code' => $storedCode,
            'password' => 'password123',
        ]);

        // بررسی که وضعیت پاسخ 200 باشد
        $response->assertStatus(200);

        // بررسی که توکن در پاسخ باشد
        $response->assertJsonStructure([
            "data" => [
                'token',
                'client_id',
                'client_secret',
            ]
        ]);

        // بررسی که کاربر به درستی در سیستم احراز هویت شده است
        $this->assertAuthenticatedAs(User::where('phone',$phone)->first());
    }

    #[Test]
    public function user_gets_error_when_code_is_incorrect()
    {
        // شماره تلفن و کد اشتباه
        $phone = '09123456789';

        // ارسال درخواست برای ارسال کد
        $response = $this->postJson(route('login.store'), [
            'phone' => $phone,
        ]);

        // بررسی که وضعیت پاسخ 202 باشد
        $response->assertStatus(202);

        // ارسال درخواست با کد اشتباه
        $response = $this->postJson(route('login.store'), [
            'phone' => $phone,
            'code' => 'wrong-code',
            'password' => 'password123',
        ]);

        // بررسی که وضعیت پاسخ 203 باشد
        $response->assertStatus(203);

        // بررسی که پیام خطا در پاسخ باشد
        $response->assertJson([
            'message' => 'کد وارد شده اشتباه است',
        ]);
    }

    #[Test]
    public function user_can_send_code_for_sms_verification()
    {
        // شماره تلفن
        $phone = '09123456789';

        // ارسال درخواست برای دریافت کد
        $response = $this->postJson(route('login.store'), [
            'phone' => $phone,
        ]);

        // بررسی که وضعیت پاسخ 202 باشد
        $response->assertStatus(202);

        // بررسی که کد در دیتابیس ذخیره شده باشد
        $this->assertDatabaseHas('phone_verifications', [
            'phone' => $phone,
        ]);

        // بررسی ساختار پاسخ
        $response->assertJsonStructure([
            'data' => [
                'phone',
                'time',
                'code',
            ],
        ]);
    }
}
