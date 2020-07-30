<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductType;
use Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $user = Auth::user();
        if($user->can('view',Product::class))
        {
            $search = $request->tbSearch;
            // $product = BD::table('product')->where('name','like','%'.$search.'%')->get()->orderBy('created_at', 'desc')->paginate(5);

             $product = Product::orderBy('created_at', 'desc')->paginate(5);
            $cat = Category::select('id','name')->get();
            $proctype = ProductType::all()->toArray();
            return view('admin.pages.search',compact('product','proctype','cat'));
        }
        else{
            return view('admin.errors.403');
        }

    }
}
