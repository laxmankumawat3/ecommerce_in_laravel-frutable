<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addproduct;

class indexController extends Controller
{
    public function index(){
        $product = addproduct::all();
        $data = compact('product');
        return view('frontend.index')->with($data);
      }
      public function shop(){
        return view('frontend.shop');
      }
      public function shop_detail(){
        return view('frontend.shop-detail');
      }
      public function chackout(){
        return view('frontend.chackout');
      }
      public function cart(){
        return view('frontend.cart');
      }
      public function testimonial(){
        return view('frontend.testimonial');
      }
      public function pagnotfound(){
        return view('frontend.404');
      }
      public function contact(){
        return view('frontend.contact');
      }
      public function login(){
        return view('frontend.login');
      }
      public function registration(){
        return view('frontend.registration');
      }
}
