@extends('layouts.mainLayout')
@section('content')

@include('navbar.navbar')
@include('navbar.navbar-login')

<h1 class="pt-[290px] mb-4 text-8xl font-baloo font-[700] text-[3rem] text-center text-black uppercase" style="letter-spacing: 2px;">
  let's <span class="text-[#B77CD7]">consult</span>
</h1>
<p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400 text-center">Feel free to share and discuss any concerns you may have regarding your beloved furry friend.</p>
    {{-- <div class="bg-white mt-[400px] my-32 bg-cover bg-no-repeat w-full  z-10">
      <h1 class="font-rubik font-[700] text-[100px] text-black mx-auto text-center uppercase">
        let's <span class="text-[#B77CD7]">consult</span> 
      </h1>
    </div> --}}

<div class="w-[90%] mt-[-128px] mx-auto flex flex-row px-20 justify-between items-center">
  @for ($i = 0; $i < 3; $i++)
    <div class="w-[461px] h-[353px] px-10 gap-y-10 rounded-lg  flex flex-col justify-center items-center">
      <a class="mt-[300px] p-4 text-1xl font-bold text-[18px] tracking-tight w-[324px] px-10 flex justify-center items-center font-inter text-[#FFEBFF] bg-purple-400 text-center rounded-t-lg">
        Health Issue
      </a>
        <img class="mt-[-40px] w-auto h-[284px] object-bottom rounded-b-lg" src="/images/image-9.png" alt="" />
        <div class="mt-[-300px]">
        <p class="text-center font-inter px-10 font-[400] text-[25px] text-black">konsultasi tentang penyakit hewan anda...</p>
        <a href="/chat" class="ml-[28.5px] mt-[128px] w-[324px] py-4 px-10 flex justify-center items-center font-bold font-inter text-[#FFEBFF] text-[18px] bg-purple-400 rounded-b-lg">
          Chat Now
        </a>
        </div>
    </div>
  @endfor
</div>
{{-- <div class="w-[90%] py-4 mx-auto flex flex-row px-20 justify-between items-center">
  @for ($i = 0; $i < 3; $i++)
    <div class="w-[461px] h-[353px] px-10 bg-[#B9B7EA] gap-y-10 rounded-lg bg-[url('/public/images/image-9.png')] flex flex-col justify-center items-center bg-cover bg-no-repeat">
      <div class="w-[324px] px-10 flex justify-center items-center font-inter font-[700] text-[#443E7C] text-[40px] bg-white rounded-lg">
        Health Issue
      </div>
      <p class="font-rubik px-10 font-[400] text-[25px] text-black">konsultasi tentang penyakit hewan anda...</p>
      <a href="/chat" class="w-[324px] px-10 flex justify-center items-center font-inter font-[600] text-[#443E7C] text-[30px] bg-white rounded-lg">
        Chat Now
      </a>
    </div>
  @endfor
</div> --}}

@php
  $loop = $consultations->count() / 4;
  $loop = floor($loop);
  $loop2 = 0;
@endphp


<div class="mt-[300px] first-letter:w-[90%] mx-auto px-20">
  @for ($i = 0; $i < $loop; $i++)
    <div class="w-full flex flex-col justify-center items-start my-10">
      <div class="bg-[#303030] my-10 h-[50px] flex justify-center items-center font-rubik font-[500] text-white text-[25px] rounded-lg px-10">
        Recommendations {{$loop2}}
      </div>
      <div class="w-full flex flex-row  justify-between items-center">
        @for ($j = 0; $j < 4; $j++)
          <div class="flex flex-col w-[300px] h-[450px] bg-[#D5DAF7] rounded-lg justify-center items-center gap-y-5 ">
            <div class="w-[215px] h-[305px] bg-white rounded-lg flex flex-col justify-center items-center gap-y-4">
              <div class="w-[98px] h-[98px] rounded-full bg-[#F2F2F2] border border-black">
                <img src="/storage/product/images/{{$consultations[$loop2]->dokters->avatar}}" class="object-contain bg-no-repeat" alt="">
              </div>
              <h1 class="font-rubik font-[500] text-black text-[25px] text-center">
                {{ $consultations[$loop2]->dokters->name }}
              </h1>
              <div class="w-[171px] h-[95px] bg-[#F2F2F2] rounded-xl overflow-auto font-rubik font-[500] text-black text-[15px] p-2">
                Lorem ipsum dolor sit amet   consectetur adipisicing elit. Perspiciatis enim officia minima iste officiis blanditiis dignissimos expedita dicta, fuga aliquid corporis quas eos soluta quam aliquam aspernatur dolorem tempora delectus!
              </div>
            </div>
            <a href="/dokter-detail/{{$consultations[$loop2]->id}}" class="flex justify-center items-center  h-[43px] bg-white font-rubik font-[600] text-black text-[20px] px-10 rounded-xl">
              Consult Now!
            </a>
          </div>
          @php
            $loop2++;
          @endphp
        @endfor
      </div>
    </div>
  @endfor
</div>

<div class="w-[90%] mx-auto px-20 my-32">
  <div class="w-full rounded-xl bg-[#D5DAF7] px-10 py-5 bg-[url('/public/images/dokter-hewan.png')] bg-cover bg-no-repeat flex flex-col justify-center items-start">
    <h1 class="font-rubik font-[500] text-[#303030] text-[100px]">
      Feeling Lost <span class="text-[150px] text-[#FFB246]">?</span>
    </h1>
    <p class="font-rubik font-[500] text-[#443E7C] w-[70%] text-[70px]">
      Answer Questions to help you get started !
    </p>
    <div class="w-full flex justify-end items-center">
      <div class="flex justify-center bg-[#FFB246] rounded-3xl items-center font-inter font-[700] text-[70px] text-black px-20 py-1">
        Answer Now
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
