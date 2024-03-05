<?php
 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use App\Payment;
use App\User;
use Session;
use Auth;

class PaymentController extends Controller
{
    private $razorpayId = "rzp_test_A3Hh4ngjCWH2Ks";
    private $razorpayKey = "brBQzWWpqpnZT6x3ZsOXsOpF";

    public function Initiate(Request $request)
    {
        $amount = $request->amount;
        Session::put('amount', $amount);
        // Generate random receipt id
        $receiptId = Str::random(20);
        
        // Create an object of razorpay
        $api = new Api($this->razorpayId, $this->razorpayKey);

        // In razorpay you have to convert rupees into paise we multiply by 100
        // Currency will be INR
        // Creating order
        $order = $api->order->create(array(
            'receipt' => $receiptId,
            'amount' => $request->all()['amount'] * 100,
            'currency' => 'INR'
            )
        );

        // Return response on payment page
        $response = [
            'orderId' => $order['id'],
            'razorpayId' => $this->razorpayId,
            'amount' => $request->all()['amount'] * 100,
            'currency' => 'INR',
            'description' => 'Basic Package',
        ];
        // Let's checkout payment page is it working
        return view('payment',compact('response'));
    }

    public function Complete(Request $request)
    {
        $payments = New Payment();

        $payments->user_id = Auth::User()->user_id;
        $payments->amount = Session::get('amount');
        $payments->rzp_paymentid = $request->rzp_paymentid;
        $payments->rzp_orderid = $request->rzp_orderid;
        $payments->rzp_signature = $request->rzp_signature;
        $payments->rzp_signature = $request->rzp_signature;
        $payments->status = "Complete";
        $payments->save();

        // Now verify the signature is correct . We create the private function for verify the signature
        $signatureStatus = $this->SignatureVerify(
            $request->all()['rzp_signature'],
            $request->all()['rzp_paymentid'],
            $request->all()['rzp_orderid']
        );

        // If Signature status is true We will save the payment response in our database
        // In this tutorial we send the response to Success page if payment successfully made
        if($signatureStatus == true)
        {
            // You can create this page
            return redirect('/user/dashboard')->with('flash_message_success','Payments Success');
        }
        else{
            // You can create this page
            return redirect('/pricing')->with('flash_message_success','Payment Failed');
        }
    }

    // In this function we return boolean if signature is correct
    private function SignatureVerify($_signature,$_paymentId,$_orderId)
    {
 
        try
        {
            // Create an object of razorpay class
            $api = new Api($this->razorpayId, $this->razorpayKey);
            $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId ,  'razorpay_order_id' => $_orderId);
            $order  = $api->utility->verifyPaymentSignature($attributes);
            return true;
        }
        catch(\Exception $e)
        {
            // If Signature is not correct its give a excetption so we use try catch
            return false;
        }
    }
}