<h2>{{__('CheckOut') }}</h2>
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
<form action="{{route('orders.store')}}" method="post">
    @csrf
    <div>
        <label for="">{{__('Name') }} :</label>
        <input type="text" name="shipping_fullname" id="">
    </div>
    <div>
        <label for="">{{__('Address') }} :</label>
        <input type="text" name="shipping_address" id="">
    </div>
    <div>
        <label for="">{{__('Phone') }} :</label>
        <input type="text" name="shipping_phone" id="">
    </div>
    <div>
        <label for="">{{__('Service') }} :</label>
        <input type="text" name="shipping_sv" id="">
    </div>
    <table>
        <thead>
            <th>
            {{__('Date Time Receive') }}
            </th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="time" name="time">
                    <input type="date" name="date">
                </td>
            </tr>
        </tbody>
    </table>

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


    <button type="submit">{{__('CheckOut') }}</button>


</form>