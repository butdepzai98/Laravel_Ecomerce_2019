<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductType;
use Validator;
use File;
use App\Http\Requests\ProductRequest;
use Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->can('view',Product::class))
        {
            $product = Product::orderBy('created_at', 'desc')->paginate(5);
            $cat = Category::select('id','name')->get();
            $proctype = ProductType::all()->toArray();
            return view('admin.pages.product.list',compact('product','proctype','cat'));
        }
        else{
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
        $user = Auth::user();
        if($user->can('create',Product::class))
        {
            $cat = Category::select('id','name')->get();
            $proctype = ProductType::all()->toArray();
            return view('admin.pages.product.add',compact('proctype','cat'));
        }
        else{
            return view('admin.errors.403');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $user = Auth::user();
        if($user->can('create',Product::class))
        {
            $product = new Product;

            if($request->hasFile('Fimg')){
                $file = $request->Fimg;

                $name_img = $file->getClientOriginalName();
                $type_img = $file->getMimeType();
                $size_img = $file->getSize();                   //Lấy ra kích thước đơn vị byte
                if($type_img == 'image/png' ||$type_img == 'image/jpg' ||$type_img == 'image/jpeg' || $type_img == 'image/gif'){
                    if($size_img <= 10000000){

                        //Đặt tên mới cho ảnh
                        $name_img = date('D-m-yy').'-'.rand().'-'.utf8tourl($name_img);
                        //dd($name_img);                           //Test tên ảnh

                        if($file->move('upload/img/product',$name_img)){

                            $product->create([
                                'image' => $name_img,
                                'name' => $request->txtName,
                                'slug' => utf8tourl($request->txtName),
                                'quantity' => $request->txtQuantity,
                                'price' => $request->txtPrice,
                                'cate_id' => $request->sltCate,
                                'productType_id' => $request->sltProtype,
                                'status' => $request->sltStatus,
                                'promotion' => $request->txtKhuyenMai,
                                'description' => $request->txtMota,
                            ]);
                            return redirect('admin/product')->with('success','Thêm sản phẩm thành công');
                        }
                        
                    }
                    else{
                        return back()->with('errors','Ảnh có kích thước quá lớn quá 10 MB');
                    }
                }
                else{
                    return back()->with('errors','File của bạn không phải là ảnh :(');
                }
        
            }
            else{
                return back()->with('errors','Bạn chưa thêm ảnh cho sản phẩm');
            }
        }
        else{
            return view('admin.errors.403');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
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
        if($user->can('create',Product::class))
        {
            $product = Product::find($id);
            $cate = Category::all();
            $ptt = ProductType::all();
            return response()->json(['product' => $product,'cate'=> $cate,'productType'=> $ptt],200);
        }
        else{
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
        if($user->can('create',Product::class))
        {
            $product = Product::find($id);
            $data = $request->all();
            // $data['description'] = $request->txtMota;
            $data['name'] = $request->txtName;
            $data['slug'] = utf8tourl($request->txtName);
            $data['quantity'] = $request->txtQuantity;
            $data['price'] = $request->txtPrice;
            $data['cate_id'] = $request->sltCate;
            $data['productType_id'] = $request->sltProtype;
            $data['status'] = $request->sltStatus;
            $data['promotion'] = $request->txtKhuyenMai;


            if($request->hasFile('Fimg')){
                $file = $request->Fimg;

                $name_img = $file->getClientOriginalName();
                $type_img = $file->getMimeType();
                $size_img = $file->getSize();                   //Lấy ra kích thước đơn vị byte
                if($type_img == 'image/png' ||$type_img == 'image/jpg' ||$type_img == 'image/jpeg' || $type_img == 'image/gif'){
                    if($size_img <= 10000000){

                        //Đặt tên mới cho ảnh
                        $name_img = date('D-m-yy').'-'.rand().'-'.utf8tourl($name_img);
                        // dd($name_img);                           Test tên ảnh

                        if($file->move('upload/img/product',$name_img)){

                            $data['image'] = $name_img;
                            if(File::exists('upload/img/product'.'/'.$product->image))
                            File::delete('upload/img/product'.'/'.$product->image);
                        }
                        
                    }
                    else{
                        return back()->with('errors','Ảnh có kích thước quá lớn quá 10 MB');
                    }
                }
                else{
                    return back()->with('errors','File của bạn không phải là ảnh :(');
                }
        
            }
            else{
                //Lấy luôn ảnh cũ
                $data['image'] = $product->image;
            }

            
            // return response()->json(['result' => $data],200);
            $product->update($data);
            return response()->json(['success' => 'Đã sửa thành công sản phẩm có id là '.$id],200);
        }
        else{
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
        if($user->can('create',Product::class))
        {
            $p = Product::find($id);
            $p->delete();
            $p_name = $p->image;
            $p_realimg = 'upload/img/product/'.$p_name;
                if(File::exists($p_realimg)){
                    File::delete($p_realimg);
                }
            return response()->json(['success'=>'Xóa thành công']);
        }
        else{
            return view('admin.errors.403');
        }
    }
}
