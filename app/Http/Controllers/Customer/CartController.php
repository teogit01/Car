<?php

namespace App\Http\Controllers\Customer;
use App\Models\CarDetail;
use App\Models\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    public function add(CarDetail $cars_detail)
    {
        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $cars_detail->id,
            'name' => $cars_detail->name,
            'price' => $cars_detail->rental,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $cars_detail
        ));
        return redirect()->route('cart.index');

    }

    public function index()
    {

        $cartItems = \Cart::session(auth()->id())->getContent();


        return view('cart.index', compact('cartItems'));
    }

    public function destroy($itemId)
    {

       \Cart::session(auth()->id())->remove($itemId);

        return back();
    }

    public function update($rowId)
    {

        \Cart::session(auth()->id())->update($rowId, [
            'quantity' => [
                'relative' => false,
                'value' => request('quantity')
            ]
        ]);

        return back();
    }

    public function checkout()
    {
        return view('cart.checkout');
    }

    public function applyCoupon()
    {
        $couponCode = request('coupon_code');

        $couponData = Coupon::where('code', $couponCode)->first();

        if(!$couponData) {
            return back()->withMessage('Phiếu giảm giá không hợp lệ');
        }


        //coupon logic
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $couponData->name,
            'type' => $couponData->type,
            'target' => 'total',
            'value' => $couponData->value,
        ));

        Cart::session(auth()->id())->condition($condition); // for a speicifc user's cart


        return back()->withMessage('Phiếu giảm giá được sử dụng!');

    }
}
