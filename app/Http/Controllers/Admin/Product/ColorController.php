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
        $tableData = [];
        $selectData = [];
        foreach(Color::get() as $color){
            $tableData[] = '
                <tr>
                    <td scope="row">'.$color->id.'</td>
                    <td>'.$color->title.'</td>
                    <td><div class="card card-body p-3 m-0 border" style="background-color:'.$color->code.'"></div></td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-primary btn-floating edit" href="'.route('admin.color.edit',$color->id).'"><i class="fa fa-edit text-light"></i></a>
                        <a class="btn btn-sm btn-danger btn-floating color-delete-warning" href="'.route('admin.color.destroy',$color->id).'"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            ';
            $selectData[] = [
                'id' => $color->id,
                'name' => $color->title,
            ];
        }
        return response()->json([
            'success' => true,
            'message' => 'Color created successfully',
            'table' => implode($tableData),
            'select' => $selectData,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'success' => true,
            'data' => Color::findOrFail($id),
            'route' => route('admin.color.update',$id)
        ], 200);
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
        $colorData = [];
        foreach(Color::get() as $color){
            $colorData[] = '
                <tr>
                    <td scope="row">'.$color->id.'</td>
                    <td>'.$color->title.'</td>
                    <td><div class="card card-body p-3 m-0 border" style="background-color:'.$color->code.'"></div></td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-primary btn-floating edit" href="'.route('admin.color.edit',$color->id).'"><i class="fa fa-edit text-light"></i></a>
                        <a class="btn btn-sm btn-danger btn-floating color-delete-warning" href="'.route('admin.color.destroy',$color->id).'"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            ';
        }
        return response()->json([
            'success' => true,
            'message' => 'Color updated successfully',
            'table' => implode($colorData),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
        $arrayData = [];
        foreach(Color::get() as $item){
            $arrayData[] = '
                <tr>
                    <td scope="row">'.$item->id.'</td>
                    <td>'.$item->title.'</td>
                    <td><div class="card card-body p-3 m-0 border" style="background-color:'.$item->code.'"></div></td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-primary btn-floating edit" href="'.route("admin.color.edit",$item->id).'"><i class="fa fa-edit text-light"></i></a>
                        <a class="btn btn-sm btn-danger btn-floating color-delete-warning" href="'.route("admin.color.destroy",$item->id).'"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            ';
        }
        return response()->json([
            'success' => true,
            'message' => 'Color successfully removed',
            'table' => implode($arrayData),
        ]);
    }
}
