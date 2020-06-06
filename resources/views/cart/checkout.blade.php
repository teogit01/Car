@extends('user.layouts.index')
@section('main')
<style type="text/css">
    .time, #subtotal, #price { border:none }
    .time:focus, #subtotal:focus, #price:focus { outline: none }
</style>
<div id="colorlib-main">
<h2 style=" margin-left: 25%">{{__('CheckOut') }}</h2>
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
<form style="width: 500px; margin-left: 25%; height: 700px" action="{{route('orders.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="">{{__('Name') }} :</label>
        <input class="form-control" type="text" name="shipping_fullname" id="">
    </div>
    <div class="form-group">
        <label for="">{{__('Address') }} :</label>
        <input class="form-control" type="text" name="shipping_address" id="">
    </div>
    <div class="form-group">
        <label for="">{{__('Phone') }} :</label>
        <input class="form-control" type="number"  name="shipping_phone" id="">
    </div>
    <div class="form-group">
        <label for="">{{__('Service') }} :</label>
        <input class="form-control" type="text" name="shipping_sv" id="">
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">{{__('Date Time Receive') }}</label>
      <input class="form-control" type="time" name="time">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">.</label>
      <input class="form-control" type="date" name="date">
    </div>
  </div>
    
                   

    <h4>{{__('Payment Method') }}</h4>

    <div>
        <label>
            <input type="radio" name="payment_method" id="" value="Tiền Mặt" checked>
            {{__('Cash') }}

        </label>

    </div>

    <div>
        <label>
            <input type="radio" name="payment_method" id="" value="paypal">
            Paypal

        </label>

    </div>


    <button class="btn btn-success" type="submit">{{__('CheckOut') }}</button>


</form>

</div>

@endsection