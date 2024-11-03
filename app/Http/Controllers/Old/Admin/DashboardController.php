<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Panel(){
        $users = User::orderBy('id','DESC')->limit(5)->get();
        $orders = Order::orderBy('id','DESC')->paginate(10);
        return view('admin.panel',compact(['users','orders']));
    }
    public function Support(){
        $users = User::orderBy('id','DESC')->limit(5)->get();
        $orders = Order::orderBy('id','DESC')->paginate(10);
        return view('admin.support',compact(['users','orders']));
    }

    public function Statistics(){
        $users = User::orderBy('id','DESC')->limit(5)->get();
        $orders = Order::orderBy('id','DESC')->paginate(10);
        return view('admin.statistics',compact(['users','orders']));
    }

}
