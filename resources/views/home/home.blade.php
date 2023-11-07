@extends('layouts.mainLayout')
@section('content')
    @include('navbar.navbar')
    <!-- <div class="w-full mt-16 p-4 text-center bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Hi, Aelita Stones!</h5>
    <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Here are your SeAn points, don't forget to use them before December 31, 2023</p>
    <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
        <a href="#" class="w-full sm:w-auto hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700" style="background-color: #303030">
            <div class="text-left">
                <div class="-mt-1 font-sans text-sm font-semibold">Your Points: 3000
                </div>
            </div>
        </a>
        <a href="#" class="w-full sm:w-auto hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700" style="background-color: #303030">
            <div class="text-left">
                <div class="-mt-1 font-sans text-sm font-semibold">Exchange</div>
            </div>
        </a>
    </div>
</div> -->


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

<!-- <h1 class="text-center pt-24 mb-4 text-8xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white" style="font-family: 'Baloo'; font-size: 80px; letter-spacing: 4px;">WELCOME TO SEAN.</h1> -->

<h1 class="pt-24 mb-4 text-8xl font-baloo font-[700] text-[3rem] text-center text-black uppercase" style="letter-spacing: 2px;">
              Welcome to <span class="text-[#D884FF]">SEAN</span>
            </h1>
<p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400 text-center">Here’s a Quick Tip, Press the Button !</p>
<div class="flex justify-center">
        <button class="bg-yellow-600 hover:bg-yellow-800 text-white font-bold py-2 px-4 rounded">
        LET’S START
        </button>
    </div>

    <div class="justify-center items-center py-4 flex">
    <div>
    <div class="flex justify-center">
        <img src="/images/Anjing.png" alt="">
    </div>
        <div class="mt-[-7.35rem] pt-16 pb-8 px-8 flex justify-center flex-col rounded-lg gap-4 items-center bg-purple-400">
            <div class="flex gap-8 py-8 flex-row rounded-lg items-center bg-purple-200 ">
                <div class="ml-8 w-[36rem]">
                    <h2 class="font-bold text-[1.2rem]">Setup Profile Hewan</h2>
                    <p>Lengkapi data hewan anda untuk mendapatkan rekomendasi produk yang sesuai</p>
                </div>
                <div class="bg-yellow-200 rounded-full justify-center items-center p-4 mr-8">
                    <h2 class="font-bold">1</h2>
                </div>
                </div>
            <div class="flex gap-8 py-8 flex-row rounded-lg items-center bg-purple-200">
                <div class="ml-8 w-[36rem]">
                    <h2 class="font-bold text-[1.2rem]">Pilih Fitur</h2>
                    <p>Pilih fitur yang ingin anda gunakan untuk kebutuhan hewan anda</p>
                </div>
                <div class="bg-yellow-200 rounded-full justify-center items-center p-4 mr-8">
                    <h2 class="font-bold">2</h2>
                </div>
                </div>
            <div class="flex gap-8 py-8 flex-row rounded-lg items-center bg-purple-200">
                <div class="ml-8 w-[36rem]">
                    <h2 class="font-bold text-[1.2rem]">Get Point</h2>
                    <p>Lakukan transaksi, dan dapatkan poin untuk ditukarkan kedepannya</p>
                </div>
                <div class="bg-yellow-200 rounded-full justify-center items-center p-4 mr-8">
                    <h2 class="font-bold">3</h2>
                </div>
                </div>
        </div> 

        <div class="pt-[4rem]">
        <div class="mb-[1rem] flex gap-8 py-8 flex-row rounded-lg items-center bg-purple-200">
                <div class="ml-8 w-[36rem]">
                    <h2 class="font-bold text-[1.2rem]">Chat & Inbox</h2>
                </div>
                <button class="bg-yellow-600 hover:bg-yellow-800 font-bold text-white justify-center items-center py-2 px-4">
                    Check
                </button>
                </div>

        <div class="mb-[1rem] flex gap-5 py-8 flex-row rounded-lg items-center bg-purple-200">
                <div class="ml-8 w-[36rem]">
                    <h2 class="font-bold text-[1.2rem]">Pet Profile</h2>
                    <p>Configure your Pet Profile to get Personalized Content !</p>
                </div>
                <button class="bg-yellow-600 hover:bg-yellow-800 font-bold text-white justify-center items-center py-2 px-4">
                    Configure
                </button>
                </div>

        <div class="flex gap-3 py-8 flex-row rounded-lg items-center bg-purple-200">
                <div class="ml-8 w-[36rem]">
                    <h2 class="font-bold text-[1.2rem]">Feeling Lost ?</h2>
                    <p>Answer Questions to help you get started !</p>
                </div>
                <button class="bg-yellow-600 hover:bg-yellow-800 font-bold text-white justify-center items-center py-2 px-4">
                    Answer Now
                </button>
                </div>
        
        </div>
    </div>
</div>
@include('footer.footer')
@endsection
