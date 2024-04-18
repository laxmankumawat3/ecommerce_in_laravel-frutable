<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\addtocartproduct;

class AddtocartController extends Controller
{
  public function addproductincart(Request $request, $id)
  {
    // Check if the product with the given ID already exists for the user
    $existingProduct = addtocartproduct::where('Product_id', $id)
      ->where('user_id', session()->get('user_id'))
      ->first();

    if ($existingProduct) {
      // If the product already exists, you can choose to handle it in different ways.
      // For example, you can show an error message and redirect back to the home page.

      return redirect()->back()->with("error", 'Product already exists in the cart.');
    }
   
    $product = new addtocartproduct();
    $product->Product_id = $id;
    $user_id = session()->get('user_id');
    $product->user_id = $user_id;
    $product->product_name = $request->product_name;
    $product->product_price = $request->product_price;
    $product->product_image = $request->product_image;
    $product->product_description = $request->product_description;
    $product->save();

    $arrayofproduct = session()->get('arrayofproduct', []);

    // Assuming $id contains the ID you want to add to the array
    if(!in_array($id,$arrayofproduct)){
      $arrayofproduct[] = $id;
      // Get the count of products
      session(['arrayofproduct' => $arrayofproduct]);
    }
    // Add $id to the array


    return redirect("/")->with("message", 'product add in cart successfully');
  }

  public function viewcart()
  {
    $user_id = session()->get('user_id');
    $product = addtocartproduct::where('user_id', $user_id)->get();
    // echo "<pre>";
    // print_r($product->all());
    $data = compact('product');
    return view('frontend.cart')->with($data);
  }



  public function productremovecart($id)
  {
    // $product = addtocartproduct::find($id);
    // $product->delete();
    // return redirect('cart');
      // Delete the product from the database
      $product = addtocartproduct::find($id);
      if ($product) {
          $product->delete();
  
          // Remove the product from the session
          $arrayofproduct = session()->get('arrayofproduct', []);
          if (($key = array_search($id, $arrayofproduct)) !== false) {
              unset($arrayofproduct[$key]);
              session(['arrayofproduct' => $arrayofproduct]);
          }
  
          // Redirect back to the cart page
          return redirect('cart')->with('success', 'Product removed from cart.');
      }
  
      // Redirect back to the cart page with an error message if the product was not found
      return redirect('cart')->with('error', 'Product not found in cart.');
  }

  public function allproductremovecart()
  {
    addtocartproduct::truncate();
    // $arrayofproduct = session()->get('arrayofproduct', []);
    Session::forget('arrayofproduct');
    return redirect('mail');
  }
}
