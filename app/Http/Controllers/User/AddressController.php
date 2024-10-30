<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'آدرس ها';
        $addresses = Address::where('userId',Auth::id())->orderBy('id','DESC')->get();
        return view('website.user.address',compact(['title','addresses']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'افزودن آدرس';
        return view('website.user.addressadd',compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
        ],[
            'state.required' => 'استان الزامی است',
            'city.required' => 'شهر الزامی است',
            'address.required' => 'آدرس الزامی است',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $request->errors()
            ], 422);
        }
        $state = State::firstWhere('name','LIKE','%'.$request->state.'%');
        if(!$state){
            $state = State::create([
                'name' => $request->state,
            ]);
        }
        $city = City::firstWhere('name','LIKE','%'.$request->city.'%');
        if(!$city){
            $city = City::create([
                'name' => $request->city,
                'stateId' => $state->id
            ]);
        }
        if($request->primary){
            foreach(Address::where('userId',Auth::id())->get() as $address){
                $address->update([
                    'primary' => 0,
                ]);
            }
        }
        Address::create([
            'userId' => Auth::id(),
            'stateId'=> $state->id,
            'cityId' => $city->id,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'number' => $request->pelak,
            'primary' => $request->primary ? 1 : 0,
        ]);
        $data = [];
        foreach(Address::with('State','City')->where('userId', Auth::id())->get() as $address){
            $data[] = $address;
        }
        return response()->json([
            'success' => true,
            'message' => 'آدرس افزوده شد',
            'data' => $data,
        ]);
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
        $title = 'ویرایش آدرس';
        $address = Address::where('id',$id)->where('userId',Auth::id())->first();
        if($address){
            return view('website.user.addressedit',compact(['title','address']));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
        ],[
            'state.required' => 'استان الزامی است',
            'city.required' => 'شهر الزامی است',
            'address.required' => 'آدرس الزامی است',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        if($request->primary){
            foreach(Address::where('userId',Auth::id())->get() as $address){
                $address->update([
                    'primary' => 0,
                ]);
            }
        }
        $state = State::firstWhere('name','LIKE','%'.$request->state.'%');
        if(!$state){
            $state = State::create([
                'name' => $request->state,
            ]);
        }
        $city = City::firstWhere('name','LIKE','%'.$request->city.'%');
        if(!$city){
            $city = City::create([
                'name' => $request->city,
                'stateId' => $state->id
            ]);
        }
        Address::where('id',$id)->update([
            'stateId' => $state->id,
            'cityId' => $city->id,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'number' => $request->number,
            'primary' => ($request->primary ? 1 : 0),
        ]);
        return redirect()->route('account.address')->with([
            'type' => 'success',
            'message' => 'آدرس با موفقیت به روز رسانی شد'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = Address::where('userId',Auth::id())->where('id',$id)->first();
        if(!$address){
            return redirect()->back()->with([
                'type' => 'success',
                'message' => 'آدرس یافت نشد'
            ]);
        }
        if($address->primary == 1){
            $findAddress = Address::where('userId',Auth::id())->orderBy('id','desc')->first();
            if($findAddress){
                $findAddress->update([
                    'primary' => 1
                ]);
            }
        }
        $address->delete();
        return redirect()->back()->with([
            'type' => 'info',
            'message' => 'آدرس با موفقیت حذف شد'
        ]);

    }
}
