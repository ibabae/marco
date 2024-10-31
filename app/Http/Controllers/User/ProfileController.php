<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'جزئیات حساب';
        $user = User::where('id',Auth::id())->first();
        return view('website.user.profile',compact(['title','user']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'nullable|email'
        ],[
            'firstName.required' => 'نام الزامی است',
            'lastName.required' => 'نام خانوادگی الزامی است',
            'email.email' => 'آدرس ایمیل صحیح نیست',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }
        $user = User::find(Auth::id());
        $user->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email
        ]);
        return response()->json([
            'success' => false,
            'message' => 'پروفایل با موفقیت به روز رسانی شد'
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
