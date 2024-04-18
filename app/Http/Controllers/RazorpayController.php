<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\payment;
  
class RazorpayController extends Controller
{
    public function index(){
        return view('razorpayView');
    }

    public function store(Request $request)
    {
        $input = $request->all();
  
        $api = new Api("rzp_test_gKQ1xeklq1IhG3", "APyro1SgwSDy6CDpW9nkybxc");
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
                // echo "<pre>";
                // print_r($response);
                // die();
                $paymentdetail = new payment;
                $paymentdetail->order_id =  $response->order_id ? $response->order_id : 123456;
                $paymentdetail->razorpay_payment_id =  $response->id;
                $paymentdetail->amount = $response->amount;
                $paymentdetail->currency = $response->currency;
                $paymentdetail->payment_status = $response->status;
                $paymentdetail->user_id = auth()->user()->id;
                $paymentdetail->save();
                Session::put('successs', 'Payment successful');
                
                return redirect('allproductremovecart');

                // you use this when you use fillable 
                // payment::create([
                //     'razorpay_payment_id' => $response->razorpay_payment_id,
                //     'amount' => $response->amount / 100, // Assuming amount is in paise, convert to currency unit
                //     'currency' => $response->currency,
                //     'user_id' => auth()->user()->id,
                //     // Add additional fields as needed
                // ]); 
            
            } catch (Exception $e) {
                Session::put('error',$e->getMessage());
                // return  $e->getMessage();
                return redirect()->back();
            }
        }
          
       
    }
}
