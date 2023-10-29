@extends('layouts.mainLayout')
@section('content')
  <nav class="w-full h-[5rem] bg-white  fixed px-10 py-6 flex flex-row justify-between items-center"> 
    <div class="flex flex-row justify-start items-center gap-x-2">
      <div class="w-[4.25rem] h-[4.25rem] ">
        <img class="w-[4.25rem] h-[4.25rem] object-contain" src="/images/Mask group.png"/>
      </div>
      <h1 class="font-inter font-bold text-black text-[2rem]">
        Sean  
      </h1>
    </div>
    <div class="flex flex-row justify-center items-center gap-x-2">
      <button class="flex w-[180px] h-[43px] border border-[#FFB246] rounded-lg justify-center items-center font-inter text-[20px] text-black font-[600]">
        Sign Up 
      </button>
      <button class="flex w-[180px] h-[43px] border border-[#FFB246] rounded-lg justify-center items-center font-inter text-[20px] text-black font-[600]">
        Log In 
      </button>
    </div>
  </nav>

  <div class="relative">
    <div class="bg-landingbg absolute top-24 bg-contain w-full min-h-screen">
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

@endsection