<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;

class AjaxController extends Controller
{
    public function getProductType(Request $request)
    {
        $p = ProductType::where('cate_id',$request->cate_id)->get();
        return response()->json($p,200);
    }
}
