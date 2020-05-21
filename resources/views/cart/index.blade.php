@extends('customer/layouts/header')


<h2>Your Cart</h2>
<table>
    <thead>
            <tr>
                <th>Tên Xe</th>
                <th>Giá Thuê</th>
                <th>Số Giờ Thuê</th>
                <th>Cập Nhật</th>
            </tr>
    
    </thead>
    <tbody>
            @foreach ($cartItems as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    
                    <td>
                        <form action="{{route('cart.update', $item->id)}}" method="get">
                            <input name="quantity" type="number" min=1 value="{{ $item->quantity }}">
                            <input class="button" type="submit" value="chọn">
                        </form>
                    </td>
                    <td>
                        <a href="{{route('cart.destroy', $item->id)}}" role="button">Xóa</a>
                    </td>
                </tr>
            @endforeach
    </tbody>
</table>
<div class="success">
    {{-- display success message --}}
        @if(session()->has('message'))
            <div class="alert alert-success text-center" role="alert">
               {{session('message')}}
            </div>
        @endif

    {{-- display error message --}}

        @if(session()->has('error'))
            <div class="alert alert-danger text-center" role="alert">
                {{session('error')}}
            </div>
        @endif
        </div>
<div>
    <form action="{{route('cart.coupon')}}" method='get'>
        <input id="coupon_code" class="input-text" name="coupon_code" value=""placeholder="Code" type="text" required>
        <input class="button" name="apply_coupon" value="Xác Nhận" type="submit">
    </form>
</div>
<div>
    <h2>Cart totals</h2>
        <ul>
            <li>SubTotal: <span>{{\Cart::session(auth()->id())->getSubTotal()}} VNĐ</span></li>
            <li>Total<span>{{\Cart::session(auth()->id())->getTotal()}}</span></li>
        </ul>
            <a href="{{route ('cart.checkout')}}">Tiến hành thanh toán</a>
</div>

