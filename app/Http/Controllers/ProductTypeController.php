<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\ProductType;
use App\Models\Category;
use Validator;
use Auth;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->can('view',ProductType::class))
        {
            $proctype = ProductType::paginate(5);
            $cat = Category::all();

            return view('admin.pages.producttype.list',compact('proctype','cat'));
        }
        else
        {
            return view('admin.errors.403');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if($user->can('view',ProductType::class))
        {
            ProductType::create(
                [
                    'name' => $request->txtName,
                    'slug' => utf8tourl($request->txtName),
                    'cate_id' => $request->sltCate,
                    'status' => $request->sltStatus
                ]
            );

            return redirect('admin/producttype')->with('success','Thêm loại sản phẩm thành công');
        }
        else
        {
            return view('admin.errors.403');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        if($user->can('view',ProductType::class))
        {
            $proctype = ProductType::find($id);
            $cat = Category::all();
            return response()->json(['proctype' => $proctype,200,'category'=> $cat,200]);
        }
        else
        {
            return view('admin.errors.403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if($user->can('view',ProductType::class))
        {
            $proctype = ProductType::find($id);
            $proctype->update([
                'name' => $request->name,
                'slug' => utf8tourl($request->name),
                'cate_id' => $request->cate_id,
                'status' => $request->status
            ]);

            return response()->json(['success' => 'Sửa thành công']);
        }
        else
        {
            return view('admin.errors.403');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if($user->can('view',ProductType::class))
        {
            $proctype = ProductType::find($id);
            $proctype->delete();

            return response()->json(['success'=>'Xóa thành công']);
        }
        else
        {
            return view('admin.errors.403');
        }
    }
}
