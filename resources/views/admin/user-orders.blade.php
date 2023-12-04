@extends('layouts.mainLayout')
@section('content')

@include('navbar.navbar-shop')

<div class="w-[80%] mx-auto mt-36">
  @php
    $i = 1;
  @endphp
  @foreach ($orders as $order)
    <div class="w-full my-5 flex flex-col px-5 py-5 border-[4px] rounded-lg border-gray-500  gap-y-5 justify-between items-center">
      <div class="flex flex-row gap-x-10 w-full justify-between items-center">
        <div class="flex flex-col gap-y-5">
          <h1 class="font-rubik font-[700] text-black text-[24px]">#</h1>
          <p class="font-rubik font-[400] text-black text-[24px]">{{$i}}</p>
        </div>
        <div class="flex flex-col gap-y-5">
          <h1 class="font-rubik font-[700] text-black text-[24px]">Status</h1>
          <p class="font-rubik font-[400] text-black text-[24px]">{{$order->shipping_status}}</p>
        </div>
        <div class="flex flex-col gap-y-5">
          <h1 class="font-rubik font-[700] text-black text-[24px]">Buyer</h1>
          <p class="font-rubik font-[400] text-black text-[24px]">{{auth()->user()->name}}</p>
        </div>
        <div class="flex flex-col gap-y-5">
          <h1 class="font-rubik font-[700] text-black text-[24px]">Date</h1>
          <p class="font-rubik font-[400] text-black text-[24px]">{{$order->created_at}}</p>
        </div>
        <div class="flex flex-col gap-y-5">
          <h1 class="font-rubik font-[700] text-black text-[24px]">Payment</h1>
          <p class="font-rubik font-[400] text-black text-[24px]">{{$order->paid_status}}</p>
        </div>
        <div class="flex flex-col gap-y-5">
          <h1 class="font-rubik font-[700] text-black text-[24px]">Payment</h1>
          <a href="{{$order->payment_url}}" class="px-10 bg-blue-500 rounded-lg py-1 font-rubik font-[500] text-white text-[24px]">Check</a>
        </div>
      </div>

      {{-- ordered product --}}
      @foreach ($order->order_products as $order_product)
        <div class="w-full flex flex-row px-5 py-5  border-gray-400 border-[4px] rounded-lg shadow-md justify-start items-center gap-x-10">
          {{-- show image --}}
          <div class="w-[30%] h-[300px]  rounded-lg">
            <img src="/storage/product/images/{{$order_product->products->image}}" alt="" class="w-full h-full object-contain">
          </div>
          <div class="flex flex-col justify-center items-start">
            <h1 class="font-rubik font-[700] text-black text-[24px]">{{$order_product->products->name}}</h1>
            <h1 class="font-rubik font-[400] text-black text-[24px]">{{$order_product->products->description}}</h1>
            <h1 class="font-rubik font-[400] text-black text-[24px]">Price: {{$order_product->products->price}}</h1>
            <h1 class="font-rubik font-[400] text-black text-[24px]">Quantity: {{$order_product->quantity}}</h1>
          </div>
        </div>
      @endforeach
    </div>
    @php
      $i++;
    @endphp
  @endforeach
</div>

@endsection