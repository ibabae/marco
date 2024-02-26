<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    
    public function ItemsData(){
        $colors = Color::get();
        $colorsArray = [];
        foreach($colors as $color){
            $colorArrayData['id'] = $color->title;
            $colorArrayData['name'] = $color->title;
            $colorsArray[] = $colorArrayData;
        }
        $sizes = Size::get();
        $sizesArray = [];
        foreach($sizes as $size){
            $sizeArrayData['id'] = $size->title;
            $sizeArrayData['name'] = $size->title;
            $sizesArray[] = $sizeArrayData;
        }
        return response()->json([
            'colors' => $colorsArray,
            'sizes' => $sizesArray,
        ]);
    }
}
