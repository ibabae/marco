<?php

namespace App\Http\Controllers;

use App\Events\UserOnlineStatus;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updatePage(Request $request)
    {
        $user = auth()->user();
        $user->current_page = $request->page;
        $user->save();

        // ارسال ایونت برای به‌روزرسانی اطلاعات آنلاین کاربران
        broadcast(new UserOnlineStatus($user->id, $user->current_page));
    }
}
