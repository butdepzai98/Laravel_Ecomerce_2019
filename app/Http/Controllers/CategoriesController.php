<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Validator;
use Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->can('view', Category::class)){
            //Lấy ra 5 bản ghi
            $cat = Category::paginate(5);
            return view('admin.pages.category.list',compact('cat'));
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
        if($user->can('create', Category::class)){
            $cat = new Category;
            $cat->name = $request->name;
            $cat->slug = utf8tourl($request->name);
            $cat->status = $request->status;
            $cat->save();

            // return redirect('admin/category')->with('success','Thêm danh mục thành công');
            return response()->json(['success','Thêm thành công']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        if($user->can('update', Category::class))
        {
            $cat = Category::find($id);
            return response()->json($cat,200);
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
        if($user->can('update', Category::class))
        {
            $validator = Validator::make($request->all(),
                [
                    'name' => 'required'
                ],
                [
                    'required' => 'Yêu cầu nhập tên danh mục'
                ]
            );

            if($validator->fails()){
                return response()->json(['errors' =>'true','message' => $validator->errors()],200);
            }
            
            $cat = Category::find($id);
            $cat->update(
                [
                'name' => $request->name,
                'slug' => utf8tourl($request->name),
                'status' => $request->status
                ]
            );
                
            return response()->json(['success' => 'Sửa thành công']);
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
        if($user->can('delete', Category::class))
        {
            $cat = Category::find($id);
            $cat->delete();

            return response()->json(['success' => 'Xóa thành công']);
        }
    }
}
