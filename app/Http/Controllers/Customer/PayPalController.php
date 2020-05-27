<?php

namespace App\Http\Controllers\Customer;
use App\Models\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Cart;

class PayPalController extends Controller
{
    public function getExpressCheckout($orderId)
    {
        $checkoutData = $this->checkoutData($orderId);

        $provider = new ExpressCheckout();

        $response = $provider->setExpressCheckout($checkoutData);

        return redirect($response['paypal_link']);
    }

    private function checkoutData($orderId)
    {
        $cart = \Cart::session(auth()->id());

        $cartItems = array_map(function ($item) use($cart) {
            return [
                'name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['quantity']

            ];
        }, $cart->getContent()->toarray());



        $checkoutData = [
            'items' => $cartItems,
            'return_url' => route('paypal.success', $orderId),
            'cancel_url' => route('paypal.cancel'),
            'invoice_id' => uniqid(),
            'invoice_description' => " Order description ",
            'total' => $cart->getSubTotal(),
            'shipping_discount' => $cart->getSubTotal() - $cart->getTotal()

        ];

        return $checkoutData;
    }

    public function cancelPage()
    {
        dd('payment failed');
    }


    public function getExpressCheckoutSuccess(Request $request, $orderId)
    {

        $token = $request->get('token');
        $payerId = $request->get('PayerID');
        $provider = new ExpressCheckout();
        $checkoutData = $this->checkoutData($orderId);

        $response = $provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            // Perform transaction on PayPal
            $payment_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $payerId);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

            if(in_array($status, ['Completed','Processed'])) {
                $order = Invoice::find($orderId);
                $order->is_paid = 1;
                $order->status = 'đã thanh toán';
                $order->save();

                // clear coupon
                \Cart::session(auth()->id())->clearCartConditions();
                // clear coupon
                \Cart::session(auth()->id())->clear();
                return redirect()->route('cart.checkout')->withMessage('Thanh toán thành công!');
            }

        }

        return redirect()->route('cart.checkout')->withError('Thanh toán thất bại!');


    }
}
