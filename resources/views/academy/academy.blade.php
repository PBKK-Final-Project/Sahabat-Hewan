@extends('layouts.mainLayout')
@section('content')
    @include('navbar.navbar')

    <div id="toast-interactive" class="mt-16 w-full max-w-[30rem] p-4 mx-auto text-gray-500 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-400" role="alert">
    <div class="flex">

        <div class="ml-3 text-sm font-normal">
            <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white" >Hi, Aelita Stones!</span>
            <div class="mb-2 text-sm font-normal">Here are your SeAn points, don't forget to use them before December 31, 2023</div> 
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <a href="#" class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 bg-purple-400 hover:bg-purple-500">Your Points: 3000</a>
                </div>
                <div>
                    <a href="#" class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Exchange</a> 
                </div>
            </div>    
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white items-center justify-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-interactive" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
</div>

<h1 class="pt-24 mb-4 text-8xl font-baloo font-[700] text-[3rem] text-center text-black uppercase" style="letter-spacing: 2px;">
            ACADEMY
            </h1>
<p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400 text-center">Find Some Information About Your Maw Paw Here !</p>

<div class="justify-center items-center py-4 flex">
    <div class="w-[44rem]">

        @foreach ($academies as $academy)
        <div class="mb-[2rem]">
            <a href="/academy/{{ $academy->slug }}">
                <h5 class="p-4 text-1xl font-bold text-[18px] tracking-tight text-[#FFEBFF] dark:text-white bg-purple-400 text-center rounded-t-lg">{{ $academy->title }}</h5>
                <div class="relative">
                    <img class="w-full h-60 object-cover object-bottom rounded-b-lg" src="{{ $academy->image }}" alt="" />
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@include('footer.footer')
@endsection
