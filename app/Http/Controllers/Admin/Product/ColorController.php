<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::get();
        $title = 'رنگ ها';
        return view('admin.products.color.list',compact(['colors','title']));
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
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'code' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        Color::create([
            'title' => $request->title,
            'code' => $request->code
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Color created successfully'
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
        return response()->json([
            'success' => true,
            'data' => Color::findOrFail($id),
            'route' => route('admin.color.update',$id)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $color = Color::findOrFail($id);
        $color->update([
            'title' => $request->title,
            'code' => $request->code,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Color updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
        return redirect()->back()->with([
            'success' => true,
            'message' => 'Color successfully removed'
        ]);
    }
}
