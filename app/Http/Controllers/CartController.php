<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
use Auth;

use Mail;
use App\Mail\ShoppingMail;

class CartController extends Controller
{
    public function __construct()
    {
        $category = Category::where('status',1)->get();
        $producttype = ProductType::where('status',1)->get();

        view()->share(['category'=>$category, 'producttype'=>$producttype]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcumb = 'Checkout';
        $cart = Cart::getContent();
        // echo "<pre>";
        //     \print_r($cart);
        // echo "</pre>";
        return view('client.pages.checkout',compact('cart','breadcumb'));
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
    //Nguyên Bản
        // $data = $request->all();
        // $data['money'] = str_replace(',','', $request->money);
        // $data['User_id'] = Auth::user()->id;
        // $data['code_order'] = 'order'.rand();
        // $data['status'] = 0;

        // $order = Order::create($data);

        // $order_id = $order->id;
        // $orderDetail = [];
        
        // foreach (Cart::getContent() as $key => $cart) {
        //     $orderDetail['order_id'] = $order_id;
        //     $orderDetail['product_id'] = $cart->id;
        //     $orderDetail['quantity'] = $cart->quantity;
        //     $orderDetail['price'] = $cart->price;
        //     OrderDetail::create($orderDetail);
        // }

        // return response()->json(['success'=>'Mua hàng thành công']);

    //Thêm Mail
        $data = $request->all();
        $data['money'] = str_replace(',','', $request->money);
        $data['User_id'] = Auth::user()->id;
        $data['code_order'] = 'order'.rand();
        $data['status'] = 0;

        $order = Order::create($data);

        $order_id = $order->id;
        $orderDetail = [];
        $orderDetails = [];
        
        foreach (Cart::getContent() as $key => $cart) {
            $orderDetail['order_id'] = $order_id;
            $orderDetail['product_id'] = $cart->id;
            $orderDetail['quantity'] = $cart->quantity;
            $orderDetail['price'] = $cart->price;
            $orderDetails[$key]= OrderDetail::create($orderDetail);
        }

        Mail::to($order->email)->send(new ShoppingMail($order, $orderDetails));
        Cart::clear();
        return response()->json(['success'=>'Mua hàng thành công']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax()){
            Cart::update($id ,[
                'quantity'=> $request->quantity
            ]);
            return response()->json(['success'=>'Sửa giỏ hàng thành công']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if($request->ajax()){
            Cart::remove($id);
        }
        return response()->json(['success'=>'Xóa sản phẩm thành công']);
    }

    //----------------------------------------------------------------------
        /**
         *          Xử lý CART
         * */ 
    public function addProduct($id, Request $request)
    {
        $product = Product::find($id);
        if($request->soluong){
            $soluong = $request->soluong;
        }
        else{
            $soluong = 1;
        }
        $cart = [
            'id' => $id,
            'name'=>$product->name,
            'price'=>$product->price-$product->promotion,
            'quantity'=>$soluong,
            'attributes' => ['img'=>$product->image]
        ];

        //Thêm vào
        Cart::add($cart);
        return back()->with('thongbao','Thêm vào giỏ hàng thành công');
    }

    public function payment()
    {
        $user = Auth::user();
        //In Số thành chuỗi ko có dấu phẩy 
        $price = str_replace(',','', Cart::getSubTotal());
        return view('client.pages.payment',compact('user','price'));
    }

}
