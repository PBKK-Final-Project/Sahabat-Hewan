@extends('layouts.mainLayout')
@section('content')

<nav class="w-full flex flex-col sticky z-40">
  <div class="w-full h-[5rem] bg-white   px-10 py-6 flex flex-row justify-between items-center "> 
    <div class="flex flex-row justify-start items-center gap-x-2">
      <div class="w-[4.25rem] h-[4.25rem] ">
        <img class="w-[4.25rem] h-[4.25rem] object-contain" src="/images/Mask group.png"/>
      </div>
      <h1 class="font-inter font-bold text-black text-[2rem]">
        SeAn  
      </h1>
    </div>
  
    <div class="grid grid-cols-5 justify-items-center items-center w-[50%] mx-auto">
      <a href="/consult" class="font-rubik font-[400] text-black text-[30px]">
        Home
      </a>
      <a href="/consult" class="font-rubik font-[400] text-black text-[30px]">
        Shop
      </a>
      <a href="/consult" class="font-rubik font-[400] text-black text-[30px]">
        Academy
      </a>
      <a href="/consult" class="font-rubik font-[400] text-black text-[30px]">
        Consult
      </a>
      <a href="/consult" class="font-rubik font-[400] text-black text-[30px]">
        Vetvan
      </a>
    </div>
  
    <div class="flex flex-row justify-center items-center gap-x-2">
      <a href="/login" class="flex w-[180px] h-[43px]  bg-[#443E7C] rounded-lg justify-center items-center font-rubik text-[30px] text-white  font-[400]">
        Logout 
      </a>
    </div>
  </div>
  
  <div class="w-[50%] h-[146px] bg-[#B9B7EA] mx-auto rounded-b-[30px] flex flex-row justify-center items-center gap-x-20  py-5 px-12">
    <div class="flex flex-row justify-between items-center gap-x-5 ">
      <div class="w-[82px] h-[82px] rounded-full bg-white"></div>
      <h1 class="font-roboto font-[700] text-[32px] text-black capitalize">ahmad rafif</h1>
    </div>
    <div class="w-[3px] h-full bg-black  mx-auto"></div>
    <div class="flex flex-col justify-center items-start ">
      <h1 class="font-roboto font-[700] text-[25px] text-black">Your Point</h1>
      <div class="flex flex-row justify-between items-center gap-x-5">
        <div class="w-[162px] h-[46px] flex justify-center items-center font-roboto font-[700] text-[25px] text-black  bg-white rounded-lg">
          3000
        </div>
        <div class="w-[162px] h-[46px] flex justify-center items-center font-roboto font-[700] text-[25px] text-[#B9B7EA] bg-black rounded-lg">
          Exchange
        </div>
      </div>
    </div>
  </div>
</nav>

<div class="bg-white my-32 bg-cover bg-no-repeat w-full  z-10">
  <h1 class="font-rubik font-[700] text-[100px] text-black mx-auto text-center uppercase">
    let's <span class="text-[#B77CD7]">consult</span> 
  </h1>
</div>

<div class="w-[90%] mx-auto  flex flex-row px-20   justify-between items-center">
  @for ($i = 0; $i < 3; $i++)
    <div class="w-[461px] h-[353px] px-10 bg-[#B9B7EA] gap-y-10 rounded-lg bg-[url('/public/images/image-9.png')] flex flex-col justify-center items-center bg-cover bg-no-repeat">
      <div class="w-[324px] px-10 flex justify-center items-center font-inter font-[700] text-[#443E7C] text-[40px] bg-white rounded-lg">
        Health Issue
      </div>
      <p class="font-rubik px-10 font-[400] text-[25px] text-black">konsultasi tentang penyakit hewan anda...</p>
      <div class="w-[324px] px-10 flex justify-center items-center font-inter font-[600] text-[#443E7C] text-[30px] bg-white rounded-lg">
        Consult
      </div>
    </div>
  @endfor
</div>

<div class="w-[90%] mx-auto px-20">
  @for ($i = 0; $i < 3; $i++)
    <div class="w-full flex flex-col justify-center items-start my-10">
      <div class="bg-[#303030] my-10 h-[50px] flex justify-center items-center font-rubik font-[500] text-white text-[25px] rounded-lg px-10">
        Recommendations
      </div>
      <div class="w-full flex flex-row  justify-between items-center">
        @for ($j = 0; $j < 4; $j++)
          <div class="flex flex-col w-[300px] h-[450px] bg-[#D5DAF7] rounded-lg justify-center items-center gap-y-5 ">
            <div class="w-[215px] h-[305px] bg-white rounded-lg flex flex-col justify-center items-center gap-y-4">
              <div class="w-[98px] h-[98px] rounded-full bg-[#F2F2F2] border border-black"></div>
              <h1 class="font-rubik font-[500] text-black text-[25px] text-center">
                dr. Dimas
              </h1>
              <div class="w-[171px] h-[95px] bg-[#F2F2F2] rounded-xl overflow-auto font-rubik font-[500] text-black text-[15px] p-2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis enim officia minima iste officiis blanditiis dignissimos expedita dicta, fuga aliquid corporis quas eos soluta quam aliquam aspernatur dolorem tempora delectus!
              </div>
            </div>
            <div class="flex justify-center items-center  h-[43px] bg-white font-rubik font-[600] text-black text-[20px] px-10 rounded-xl">
              Consult Now!
            </div>
          </div>
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
