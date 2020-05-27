<h2>Thanh Toán</h2>
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
        <label for="">Tên</label>
        <input type="text" name="shipping_fullname" id="">
    </div>
    <div>
        <label for="">Địa Chỉ Giao Xe</label>
        <input type="text" name="shipping_address" id="">
    </div>
    <div>
        <label for="">SĐT</label>
        <input type="text" name="shipping_phone" id="">
    </div>
    <table>
        <thead>
            <th>
                Thời Gian Nhận Xe
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

    <h4>Phương thức thanh toán</h4>

    <div>
        <label>
            <input type="radio" name="payment_method" id="" value="Tiền Mặt" checked>
            Tiền Mặt

        </label>

    </div>

    <div>
        <label>
            <input type="radio" name="payment_method" id="" value="paypal">
            Paypal

        </label>

    </div>


    <button type="submit">Thanh Toán</button>


</form>