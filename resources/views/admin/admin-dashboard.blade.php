@extends('layouts.mainLayout')
@section('content')

@include('navbar.navbar-shop')

<div class="bg-gray-300 mt-16 w-full h-16 flex flex-row justify-between px-6 items-center fixed top-0 left-0 right-0 z-10">
  <h1 class="font-medium block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
    Admin Dashboard
  </h1>

  <div class="flex flex-row gap-x-10 space-x-auto justify-center relative">
    <a href="/create-category" 
       @class([
           'font-medium block py-2 pl-3 pr-4 text-gray-900 rounded',
           'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
           'text-blue-700' => request()->is('create-category')
       ])>
       Create Category
    </a>
    
    <a href="/create-type" 
       @class([
           'font-medium block py-2 pl-3 pr-4 text-gray-900 rounded',
           'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
           'text-blue-700' => request()->is('create-type')
       ])>
       Create Type
    </a>
  
      <a href="/admin-academy" 
         @class([
             'font-medium block py-2 pl-3 pr-4 text-gray-900 rounded',
             'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
             'text-blue-700' => request()->is('academy')
         ])>
         Academy
      </a>
  
    <a href="/products" 
       @class([
           'font-medium block py-2 pl-3 pr-4 text-gray-900 rounded',
           'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
           'text-blue-700' => request()->is('products')
       ])>
       Products
    </a>
    
    <a href="/orders" 
       @class([
           'font-medium block py-2 pl-3 pr-4 text-gray-900 rounded',
           'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
           'text-blue-700' => request()->is('orders')
       ])>
       Orders
    </a>
    
    <a href="/admin/users" 
       @class([
           'font-medium block py-2 pl-3 pr-4 text-gray-900 rounded',
           'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
           'text-blue-700' => request()->is('admin/users')
       ])>
       Users
    </a>
  </div>
  
  <div class="basis-1/6 flex justify-end items-center">
    <h1 class="font-medium block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
      {{auth()->user()->name}}
    </h1>
  </div>
</div>

@endsection
