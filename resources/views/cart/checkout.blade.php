@extends('user.layouts.index')
@section('main')
<style type="text/css">
    .main { width: 100%; display: flex; }
    .left { width: 50%; margin-left: 20px; }
    .right { width: 40%; }
    .left-main { width: 100%; }
    .label-input { width: 100%; color: black }
    .label { width: 15% }
    .input { width: 80%; border: 1px solid #ddd; border-radius: 4px }
</style>
<div id="colorlib-main">
    <section class="ftco-section">
        <h2>{{__('CheckOut Info') }}</h2>
            <hr>
        <div class="main">
            <div class="left">
                <div class="left-main">
                    <div class="success" style="width: 100%">
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
                        <form action="{{route('orders.store')}}" method="post">
                            @csrf
                            <div class='label-input'>
                                <label for="" class="label" >{{__('Name') }} :</label>
                                <input class="input" type="text" name="shipping_fullname" id="">
                            </div>
                            <div class='label-input'>
                                <label class="label" for="">{{__('Address') }} :</label>
                                <input class="input" type="text" name="shipping_address" id="">
                            </div>
                            <div class='label-input'>
                                <label class="label" for="">{{__('Phone') }} :</label>
                                <input class="input" type="text" name="shipping_phone" id="">
                            </div>
                            <div class='label-input'>
                                <label class="label" for="">{{__('Service') }} :</label>
                                <input class="input" type="text" name="shipping_sv" id="">
                            </div>


                            <table style="width: 100%">
                                <thead>
                                    <th>
                                        {{__('Date Time Receive') }}
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="display: flex;">
                                            <input class="input" style="width: 30%" type="time" name="time"> &nbsp;
                                            <input class="input" style="width: 65%" type="date" name="date">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <h4>{{__('Payment Method') }}</h4>

                            <label>
                                <input type="radio" name="payment_method" id="" value="Tiền Mặt" checked>
                            {{__('Cash') }}

                            </label>

                            <div>
                                <label>
                                    <input type="radio" name="payment_method" id="" value="paypal">
                                        Paypal
    
                                </label>

                            </div>

                            <div style="width: 100%;">
                                <button class="btn btn-outline-info" style="border-radius: 4px; width: 20%;"  type="submit">{{__('Back') }}</button> 
    
                                <button class="btn btn-info" style="border-radius: 4px" type="submit">      {{__('CheckOut') }}</button>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="right">
                
            </div>
        </div>
<!-- <form style="width: 500px; margin-left: 25%; height: 700px" action="{{route('orders.store')}}" method="post">
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


</form> -->

</div>

@endsection
