<?php
 
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Event;
use PaytmWallet;
 
 
class EventController extends Controller
{
 
 
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function bookEvent()
    {
        return view('event');
    }
 
 
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function eventOrderGen(Request $request)
    {
     $this->validate($request, [
          'name' => 'required',
        ]);
        $input = $request->all();
        $input['order_id'] = rand(1111,9999);
        $input['amount'] = 50;
 
 		// print_r(url('payment/status'));die;
        Event::insert($input);
 		$user_id = rand(111,999);
        $payment = PaytmWallet::with('receive');

        $payment->prepare([
          'order' => $input['order_id'],
          'user' => $user_id,
          'mobile_number' => $request->mobile_number,
          'email' => $request->email,
          'amount' => $input['amount'],
          'callback_url' => url('api/payment/status')
        ]);
        return $payment->receive();
    }
 
    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback()
    {	
    	
        $transaction = PaytmWallet::with('receive');
 
        $response = $transaction->response();
        $order_id = $transaction->getOrderId();
 
        if($transaction->isSuccessful()){
          Event::where('order_id',$response['ORDERID'])->update(['status'=>'success', 'payment_id'=>$response['TXNID']]);
 
          dd('Payment Successfully Credited.');
 
        }else if($transaction->isFailed()){
          Event::where('order_id',$order_id)->update(['status'=>'failed', 'payment_id'=>$response['TXNID']]);
          dd('Payment Failed. Try again lator');
        }
    }    
}