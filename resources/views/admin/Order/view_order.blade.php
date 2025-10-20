@extends('backend.layout.app')
@section('content')

    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-8 mt-10 relative">
        <a href="{{url('Dashboard/orders')}}" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900 text-xl font-bold">&times;</a>
        <h1 class="text-3xl font-bold mb-4">Order Confirmed!</h1>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Order #{{$order->id}}</h2>

        </div>

        <div class="flex flex-wrap mb-6">
            <div class="w-full md:w-1/2 mb-4 md:mb-3">
                <h3 class="font-semibold mb-2">Delivery Address</h3>
                <p>{{$order->billing_address}}.<br>{{$order->billing_city}}, {{$order->billing_post_code}}</p>
            </div>
            <div class="w-full md:w-1/2 mb-4 md:mb-0">
                <h3 class="font-semibold mb-2">Customer Information</h3>
                <p>{{$order->billing_first_name}} {{$order->billing_last_name}}<br>{{$order->billing_mobile}}, {{$order->email}}</p>
            </div>


        </div>

        <div class="flex flex-wrap border-t pt-4">
            <div class="w-full lg:w-2/3">
                @foreach($order->products as $value)
                <div class="flex items-center mb-4">
                    <img src="{{ $value->getFirstMediaUrl('images')}}" alt="Product Image" class="w-16 h-16 rounded mr-4">
                    <div>
                        <h4 class="font-semibold">{{$value->name}}</h4>
                        <p>Quantity {{$value->pivot->quantity}}</p>
                        <p>{{$value->price}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="w-full lg:w-1/3 border-l lg:border-t-0 border-t pt-4 lg:pt-0 lg:pl-4">
                <h3 class="font-semibold mb-4">Order Essentials</h3>
                <div class="flex justify-between mb-2">
                    <span>Sub-Total</span>
                    <span>$340</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Shipping</span>
                    <span>$7</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Tax</span>
                    <span>$13</span>
                </div>
                <div class="flex justify-between font-bold">
                    <span>Order Total</span>
                    <span>{{$order->total}}</span>
                </div>
            </div>
        </div>
@endsection
