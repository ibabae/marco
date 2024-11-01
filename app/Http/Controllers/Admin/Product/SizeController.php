<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::get();
        $title = 'اندازه ها';
        return view('admin.products.size.list',compact(['sizes','title']));
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

        Size::create([
            'title' => $request->title,
            'code' => $request->code
        ]);
        $tableData = [];
        $selectData = [];
        foreach(Size::get() as $item){
            $tableData[] = '
                <tr>
                    <td scope="row">'.$item->id.'</td>
                    <td>'.$item->title.'</td>
                    <td>'.$item->code.'</td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-primary btn-floating edit" href="'.route('admin.shop.size.edit',$item->id).'"><i class="fa fa-edit text-light"></i></a>
                        <a class="btn btn-sm btn-danger btn-floating size-delete-warning" href="'.route('admin.shop.size.destroy',$item->id).'"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            ';
            $selectData[] = [
                'id' => $item->id,
                'name' => $item->title,
            ];
        }
        return response()->json([
            'success' => true,
            'message' => 'Size created successfully',
            'table' => implode($tableData),
            'select' => $selectData,
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
            'data' => Size::findOrFail($id),
            'route' => route('admin.shop.size.update',$id),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $size = Size::findOrFail($id);
        $size->update([
            'title' => $request->title,
            'code' => $request->code,
        ]);
        $tableData = [];
        $selectData = [];
        foreach(Size::get() as $item){
            $tableData[] = '
                <tr>
                    <td scope="row">'.$item->id.'</td>
                    <td>'.$item->title.'</td>
                    <td>'.$item->code.'</td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-primary btn-floating edit" href="'.route('admin.shop.size.edit',$item->id).'"><i class="fa fa-edit text-light"></i></a>
                        <a class="btn btn-sm btn-danger btn-floating size-delete-warning" href="'.route('admin.shop.size.destroy',$item->id).'"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            ';
            $selectData[] = [
                'id' => $size->id,
                'name' => $size->title,
            ];
        }
        return response()->json([
            'success' => true,
            'message' => 'Size updated successfully',
            'table' => implode($tableData),
            'select' => $selectData,
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = Size::findOrFail($id);
        $size->delete();
        $sizeArray = [];
        foreach(Size::get() as $item){
            $sizeArray[] = '
                <tr>
                    <td scope="row">'.$item->id.'</td>
                    <td>'.$item->title.'</td>
                    <td>'.$item->code.'</td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-primary btn-floating edit" href="'.route('admin.shop.size.edit',$item->id).'"><i class="fa fa-edit text-light"></i></a>
                        <a class="btn btn-sm btn-danger btn-floating size-delete-warning" href="'.route('admin.shop.size.destroy',$item->id).'"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            ';
        }
        return response()->json([
            'success' => true,
            'message' => 'Size successfully removed',
            'table' => implode($sizeArray),
        ]);
    }
}
