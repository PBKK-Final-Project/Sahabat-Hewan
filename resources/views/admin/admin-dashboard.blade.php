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
    
    <!-- Tambahkan class 'text-blue-700' jika route adalah 'create-type' -->
    <a href="/create-type" 
       @class([
           'font-medium block py-2 pl-3 pr-4 text-gray-900 rounded',
           'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
           'text-blue-700' => request()->is('create-type')
       ])>
       Create Type
    </a>
  
    <!-- Academy Dropdown -->
    <div class="relative group">
      <a href="#" 
         @class([
             'font-medium block py-2 pl-3 pr-4 text-gray-900 rounded',
             'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
             'text-blue-700' => request()->is('academy', 'create-academy', 'edit-academy', 'delete-academy')
         ])>
         Academy
      </a>
      <ul class="absolute hidden bg-white text-gray-900 border border-gray-200 py-2 space-y-2 z-10 w-48 rounded-md shadow-lg">
        <li><a href="/create-academy" class="block px-4 py-2 hover:bg-gray-100">Create Academy</a></li>
        <li><a href="/edit-academy" class="block px-4 py-2 hover:bg-gray-100">Edit Academy</a></li>
        <li><a href="/delete-academy" class="block px-4 py-2 hover:bg-gray-100">Delete Academy</a></li>
      </ul>
    </div>
  
    <!-- Tambahkan class 'text-blue-700' jika route adalah 'products' -->
    <a href="/products" 
       @class([
           'font-medium block py-2 pl-3 pr-4 text-gray-900 rounded',
           'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
           'text-blue-700' => request()->is('products')
       ])>
       Products
    </a>
    
    <!-- Tambahkan class 'text-blue-700' jika route adalah 'orders' -->
    <a href="/orders" 
       @class([
           'font-medium block py-2 pl-3 pr-4 text-gray-900 rounded',
           'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
           'text-blue-700' => request()->is('orders')
       ])>
       Orders
    </a>
    
    <!-- Tambahkan class 'text-blue-700' jika route adalah 'admin/users' -->
    <a href="/admin/users" 
       @class([
           'font-medium block py-2 pl-3 pr-4 text-gray-900 rounded',
           'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
           'text-blue-700' => request()->is('admin/users')
       ])>
       Users
    </a>
  </div>
  
  <style>
    .group:hover .absolute {
      display: block;
    }
  
    .rounded-md {
      border-radius: 0.375rem; /* 6px */
    }
  
    .shadow-lg {
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
  </style>
  
  <div class="basis-1/6 flex justify-end items-center">
    <h1 class="font-medium block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
      {{auth()->user()->name}}
    </h1>
  </div>
</div>

@endsection
