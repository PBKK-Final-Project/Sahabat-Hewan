@extends('layouts.mainLayout')
@section('content')

@include('navbar.navbar-shop')

<div class="bg-gray-500 mt-32 w-full h-[200px] flex flex-row justify-between px-10 items-center">
  <h1 class="font-rubik basis-1/6  font-[700] text-white text-[30px]">
    Admin Dashboard
  </h1>

  <div class="flex flex-row gap-x-10 ">
    <a href="/create-category" class="font-rubik font-[400] text-white text-[30px]">
      Create Category
    </a>
    <a href="/create-type" class="font-rubik font-[400] text-white text-[30px]">
      Create Type
    </a>
    <a href="/create-product" class="font-rubik font-[400] text-white text-[30px]">
      Create Product
    </a>
    <a href="/products" class="font-rubik font-[400] text-white text-[30px]">
      Products
    </a>
    <a href="/orders" class="font-rubik font-[400] text-white text-[30px]">
      Orders
    </a>
    <a href="/admin/users" class="font-rubik font-[400] text-white text-[30px]">
      Users
    </a>
  </div>

  <div class="basis-1/6 flex justify-end items-center">
    <h1 class="font-rubik  font-[700] text-white text-[30px] ">
      {{auth()->user()->name}}
    </h1>
  </div>
</div>

@endsection 