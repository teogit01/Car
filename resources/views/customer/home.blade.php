@extends('customer/index')

@section('popular-content')
    @if(isset($data))
        @foreach ($data as $item)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="single-location mb-30">
                <div class="location-img">
                <img src='{{asset("img/CarDetail/")}}/{{json_decode($item->image)[0]}}' alt="">
                </div>
                <div class="location-details">
                    <p>{{$item->name}}</p>
                    <a href="#" class="location-btn">Giá <i class="ti-plus"></i>{{$item->rentail}}</a>
                </div>
            </div>
        </div>
        @endforeach
    @endif
    
@endsection