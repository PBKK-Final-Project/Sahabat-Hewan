@extends('layouts.mainLayout')
@section('content')
    @include('navbar.navbar')
    
<h1 class="pt-24 mb-4 text-8xl font-baloo font-[700] text-[3rem] text-center text-black uppercase" style="letter-spacing: 2px;">
              ACADEMY
            </h1>

<!-- <div class="justify-center items-center py-4 flex">
<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-auto">
    <a href="#">
        <img class="rounded-t-lg" src="{{ asset('images/Anjing.png') }}" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">
            Read more
            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>
</div> -->
<div class="justify-center items-center py-4 flex">
    <div class="max-w-[35rem] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="p-5 mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white bg-purple-400 text-center rounded-t-lg">Noteworthy technology acquisitions 2021</h5>
        </a>
        <a href="#">
            <img class="rounded-b-lg" src="{{ asset('images/Anjing.png') }}" alt="" />
        </a>
    </div>
</div>



    <!-- <div class="justify-center items-center py-4 flex">
    <div>
        <div class="pt-[1rem]">
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
</div> -->
@include('footer.footer')
@endsection
