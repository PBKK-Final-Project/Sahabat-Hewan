@extends('layouts.mainLayout')
@section('content')
  <nav class="w-full h-[5rem] bg-white  fixed px-10 py-6 flex flex-row justify-between items-center z-20"> 
    <div class="flex flex-row justify-start items-center gap-x-2">
      <div class="w-[4.25rem] h-[4.25rem] ">
        <img class="w-[4.25rem] h-[4.25rem] object-contain" src="/images/Mask group.png"/>
      </div>
      <h1 class="font-inter font-bold text-black text-[2rem]">
        Sean  
      </h1>
    </div>
    <div class="flex flex-row justify-center items-center gap-x-2">
      {{-- <a href="/register" class="flex w-[180px] h-[43px] border border-[#FFB246] rounded-lg justify-center items-center font-inter text-[20px] text-black font-[600]">
        Sign Up 
      </a>
      <a href="/login" class="flex w-[180px] h-[43px] border border-[#FFB246] rounded-lg justify-center items-center font-inter text-[20px] text-black font-[600]">
        Log In 
      </a> --}}


      @if (Route::has('login'))
            @auth
                {{-- <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> --}}
                <a href="{{ url('/home') }}" class="flex w-[180px] h-[43px] border border-[#FFB246] rounded-lg justify-center items-center font-inter text-[20px] text-black font-[600]">
                  Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
        
                    <button type="submit" class="flex w-[180px] h-[43px] border border-[#FFB246] rounded-lg justify-center items-center font-inter text-[20px] text-black font-[600]">
                        {{ __('Log Out') }}
                    </button>
                </form>
            @else
                {{-- <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a> --}}
                <a href="{{ route('login') }}" class="flex w-[180px] h-[43px] border border-[#FFB246] rounded-lg justify-center items-center font-inter text-[20px] text-black font-[600]">
                  Log In 
                </a>
                @if (Route::has('register'))
                    {{-- <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a> --}}
                    <a href="{{ route('register') }}" class="flex w-[180px] h-[43px] border border-[#FFB246] rounded-lg justify-center items-center font-inter text-[20px] text-black font-[600]">
                      Sign Up 
                    </a>
                @endif
            @endauth
      @endif
    </div>
  </nav>

  <div class="relative">
    <div class="relative w-full min-h-screen ">
      <div class="bg-landingbg  absolute top-24 bg-cover bg-no-repeat w-full min-h-screen z-10">
        <div class="w-full px-40 py-40 flex justify-start items-start">
          <div class="w-[33%] flex flex-col justify-center items-center gap-y-4">
            <h1 class="font-rubik font-[700] text-[3rem] text-center text-black uppercase">
              we <span class="text-[#D884FF]">care</span>  about your pet
            </h1>
            <p class="font-rubik font-[400] text-[20px] text-black text-center">
              Because Pets Make a House a Home – We're Here to Keep Yours Healthy and Happy
            </p>
            <button class="w-[281px] h-[67px] rounded-lg flex justify-center items-center bg-[#FFB246]">
              <p class="font-roboto font-[700] text-[32px] text-white text-center">Read More</p>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="flex justify-between items-start px-3 py-5 my-20 z-0">
      {{-- FOTO --}}
      <div class="flex flex-col  justify-start items-start w-[60%]">
        <div class="w-[630px] h-[420px] bg-[url('/public/images/orang-anjing.png')]">
        </div>
        <div class="w-[430.591px] h-[346.92px] bg-[url('/public/images/orang-anjing2.png')] bg-cover rotate-[30deg] rounded-lg translate-x-[30rem] -translate-y-3/4">
        </div>
      </div>

      {{-- Deskripsi --}}
      <div class="flex flex-col  justify-start items-start w-[30%] gap-y-10">
        <h1 class="uppercase font-rubik font-[600] text-[32px] text-black"> WHAT DO SEAN DO</h1>
        <p class="font-rubik font-[300] text-left text-black text-[24px]">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eleifend, metus eget lacinia lobortis, nisi nunc venenatis nisl, tincidunt malesuada quam sapien eget ante. Nullam ornare odio et tortor laoreet, facilisis congue libero tempor. Morbi commodo quam et mi consectetur euismod sed non eros. Proin lectus enim, lacinia non facilisis eu, ornare eu nisl. Fusce tristique, ipsum nec lacinia ultricies, odio neque viverra libero, in ornare nisi neque vel neque. Morbi rhoncus dui nunc, id lobortis libero venenatis eget. Etiam a nunc erat. Integer a nunc fermentum leo pretium lacinia.
        </p>
      </div>
    </div>

    <div class="w-full h-[749px] bg-[url('/public/images/kucing.png')] bg-cover bg-no-repeat">
      <div class="flex justify-start h-full items-center px-10">
        <div class="flex flex-col justify-center items-center w-[40%]  gap-y-10">
          <h1 class="font-rubik font-[600] text-[32px] text-white uppercase">
            SEAN’S PURPOSE
          </h1>
          <p class="font-rubik font-[300] text-[24px] text-white">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eleifend, metus eget lacinia lobortis, nisi nunc venenatis nisl, tincidunt malesuada quam sapien eget ante. Nullam ornare odio et tortor laoreet, facilisis congue libero tempor. Morbi commodo quam et mi consectetur euismod sed non eros. Proin lectus enim, lacinia non facilisis eu, ornare eu nisl. Fusce tristique, ipsum nec lacinia ultricies, odio neque viverra libero, in ornare nisi neque vel neque. Morbi rhoncus dui nunc, id lobortis libero venenatis eget. Etiam a nunc erat. Integer a nunc fermentum leo pretium lacinia.
          </p>
        </div>
      </div>
    </div>

    <div class="flex justify-between items-start px-3 py-5 my-20 z-0">
      {{-- FOTO --}}
      <div class="flex flex-col  justify-start items-start w-[60%]">
        <div class="w-[630px] h-[420px] bg-[url('/public/images/image-4.png')] bg-cover bg-no-repeat">
        </div>
        <div class="w-[430.591px] h-[346.92px] bg-[url('/public/images/image-5.png')] bg-cover rotate-[30deg] rounded-lg translate-x-[30rem] -translate-y-3/4">
        </div>
      </div>

      {{-- Deskripsi --}}
      <div class="flex flex-col  justify-start items-start w-[30%] gap-y-10">
        <h1 class="uppercase font-rubik font-[600] text-[32px] text-black">SEAN’S SERVICES</h1>
        <p class="font-rubik font-[300] text-left text-black text-[24px]">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eleifend, metus eget lacinia lobortis, nisi nunc venenatis nisl, tincidunt malesuada quam sapien eget ante. Nullam ornare odio et tortor laoreet, facilisis congue libero tempor. Morbi commodo quam et mi consectetur euismod sed non eros. Proin lectus enim, lacinia non facilisis eu, ornare eu nisl. Fusce tristique, ipsum nec lacinia ultricies, odio neque viverra libero, in ornare nisi neque vel neque. Morbi rhoncus dui nunc, id lobortis libero venenatis eget. Etiam a nunc erat. Integer a nunc fermentum leo pretium lacinia.
        </p>
      </div>
    </div>

    <div class="w-full h-[700px] bg-cover bg-no-repeat bg-[url('/public/images/image-6.png')] py-20">
      <div class="flex justify-start h-full items-start px-10">
        <div class="flex flex-col justify-start items-start w-[30%]  gap-y-10">
          <h1 class="font-rubik font-[600] text-[32px] text-white uppercase">
            JOIN OUR FAMILY
          </h1>
          <p class="font-rubik font-[300] text-[24px] text-white">
            List your veterinary practice and grow your business online
          </p>
          <button class="w-[229px] h-[50px] font-roboto font-[700] text-[20px] flex justify-center items-center text-white bg-[#FFB246] rounded-[25px]">
            JOIN SEAN
          </button>
        </div>
      </div>
    </div>
  </div>

  <footer class="flex flex-row justify-start items-start px-10 py-10 gap-x-20">
    <div class="flex flex-col gap-y-5 justify-center items-stretch ">
      <div class="flex flex-row justify-center items-end gap-x-5">
        <div class="w-[4.25rem] h-[4.25rem] ">
          <img class="w-[4.25rem] h-[4.25rem] object-contain" src="/images/Mask group.png"/>
        </div>
        <h1 class="font-Roboto font-normal text-black text-[40px]">
          SeAn  
        </h1>
      </div>
      <p class="font-rubik font-[300] text-[20px] text-black">
        SeAn@gmail.com
      </p>
      <p class="font-rubik font-[300] text-[20px] text-black">
        +62539373646348
      </p>
      <p class="font-rubik font-[300] text-[20px] text-black">
        SeAn Company
      </p>
    </div>

    <div class="flex flex-col gap-y-5 justify-center items-stretch">
      <h1 class="font-rubik font-[600] text-black text-[24px]">
        Brows By City
      </h1>
      <p class="font-rubik font-[300] text-[20px] text-black">
        Surabaya
      </p>
      <p class="font-rubik font-[300] text-[20px] text-black">
        Yogyakarta
      </p>
      <p class="font-rubik font-[300] text-[20px] text-black">
        Jakarta
      </p>
      <p class="font-rubik font-[300] text-[20px] text-black">
        Madura
      </p>
      <p class="font-rubik font-[300] text-[20px] text-black">
        Solo
      </p>
    </div>

    <div class="flex flex-col gap-y-5 justify-center items-stretch">
      <h1 class="font-rubik font-[600] text-black text-[24px]">
        Company 
      </h1>
      <p class="font-rubik font-[300] text-[20px] text-black">
        About Us
      </p>
      <p class="font-rubik font-[300] text-[20px] text-black">
        Services
      </p>
      <p class="font-rubik font-[300] text-[20px] text-black">
        Contact Us
      </p>
    </div>
  </footer>

@endsection