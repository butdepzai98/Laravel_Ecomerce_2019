<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProductType;
use App\Models\Category;
use App\Models\Product;

use Auth;
use Cart;

class HomeController extends Controller
{
    public function __construct()
    {
        $category = Category::where('status',1)->get();
        $producttype = ProductType::where('status',1)->get();

        view()->share(['category'=>$category, 'producttype'=>$producttype]);
    }
    
    public function index()
    {
        $apple = Product::select('id','name','image','price','promotion','productType_id')->where('productType_id',1)->get();
        $laptop = Product::select('id','name','image','price','promotion','cate_id')->where('cate_id',4)->get();
        $vinsmart = Product::select('id','name','image','price','promotion','productType_id')->where('productType_id',3)->get();
            // echo "<pre>";
            // print_r($laptop);
            // echo "</pre>";
        return view('client.pages.index',compact('apple','laptop','vinsmart'));
    }

    public function producttype($id)
    {
        $product = Product::select('id','name','image','price','promotion','productType_id')->where('productType_id',$id)->get();
        $productTypeFind = ProductType::find($id);
        $breadcumb = $productTypeFind->name;

        return view('client.pages.product',compact('product','productTypeFind','breadcumb'));
    }

    public function product($id)
    {
        $product = Product::select('id','name','image','price','promotion','productType_id','description')->where('id',$id)->get();
        
        //Breadcum
            foreach ($product as $value) {
                $breadcumb = $value->name;
                $pt_id = $value->productType_id;
            }
            $productType = ProductType::find($pt_id);
            $prtt = $productType['name'];
        //End-Breadcum

        return view('client.pages.single',compact('product','prtt','breadcumb'));
    }

    public function contact()
    {
        $breadcumb = 'Contact';
        return view('client.pages.contact',compact('breadcumb'));
    }
    
    public function about()
    {
        $breadcumb = 'About';
        return view('client.pages.about',compact('breadcumb'));
    }
    
}
