<?php

namespace App\Http\Controllers\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\CarDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $request->validate([
            'shipping_fullname' => 'required',
            'shipping_address' => 'required',
            'shipping_phone' => 'required',
            'payment_method' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $order = new Invoice();
        
        $order->name = $request->input('shipping_fullname');
        $order->address = $request->input('shipping_address');
        $order->phone = $request->input('shipping_phone');
        $order->grand_total = \Cart::session(auth()->id())->getTotal();
        $order->item_count = \Cart::session(auth()->id())->getContent()->count();
        $order->date = $request->input('date');
        $order->time = $request->input('time');

        $order->user_id = auth()->id();

        if (request('payment_method') == 'paypal') {
            $order->payment_method = 'paypal';
        }
        
        $order->save();
        
        
        //save order items
        
        $cartItems = \Cart::session(auth()->id())->getContent();
        
        foreach($cartItems as $item) {
            $order->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity]);
        }
        // doi trang thai xe
        $invoiceDetails = InvoiceDetail::where('invoice_id',$order->id)->get();

        foreach ($invoiceDetails as $tl) {
            $car = CarDetail::where('id',$tl->car_detail_id)->get();
            $car[0]->status = 1;
            $car[0]->save();
        }
        
        
        // //payment
        if(request('payment_method') == 'paypal') {
                //redirect to paypal
            return redirect()->route('paypal.checkout', $order->id);

        }

        //empty cart
        \Cart::session(auth()->id())->clear();
        
        // clear coupon
        \Cart::session(auth()->id())->clearCartConditions();

        return redirect()->route('cart.checkout')->withMessage('Đặt hàng thành công!');

    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Order  $order
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Order $order)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Order  $order
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Order $order)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Order  $order
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Order $order)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Order  $order
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Order $order)
    // {
    //     //
    // }
}
