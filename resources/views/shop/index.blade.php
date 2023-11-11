
@extends('layouts.mainLayout')
@section('content')

<script type="module">

let anjingOnclick = false;
let kucingOnclick = false;
$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $(document).ready(function () {
    // add dropdown if id anjing is clicked
    $('#anjing').click(function (e) { 
      e.preventDefault();

      if(!anjingOnclick)
      {
        anjingOnclick = true;
        $('#dropdown-1').html(`
              <a href="#" class="font-rubik font-[300] text-[20px] text-[#4C4C4C]">> Makanan Anjing</a>
              <a href="#" class="font-rubik font-[300] text-[20px] text-[#4C4C4C]">> Obat Anjing</a>
              <a href="#" class="font-rubik font-[300] text-[20px] text-[#4C4C4C]">> Aksesoris Anjing</a>
        `);
      } else 
      {
        anjingOnclick = false;
        $('#dropdown-1').html('');
      }
      
    });

    $('#kucing').click(function (e) { 
      e.preventDefault();

      if(!kucingOnclick)
      {
        kucingOnclick = true;
        $('#dropdown-2').html(`
              <a href="#" class="font-rubik font-[300] text-[20px] text-[#4C4C4C]">> Makanan kucing</a>
              <a href="#" class="font-rubik font-[300] text-[20px] text-[#4C4C4C]">> Obat kucing</a>
              <a href="#" class="font-rubik font-[300] text-[20px] text-[#4C4C4C]">> Aksesoris kucing</a>
        `);
      } else 
      {
        kucingOnclick = false;
        $('#dropdown-2').html('');
      }
      
    });
  })

</script>

@include('navbar.navbar-shop')

<div class="w-[80%] mt-[150px] flex flex-row justify-center items-center mx-auto gap-x-10 my-10 z-20">
  <p class="font-rubik font-[400] text-[24px] text-[#443E7C]">Search</p>
  <input type="text" class="w-[500px] h-[50px] rounded-xl border border-[#443E7C] px-5 py-2 font-rubik font-[400] text-[24px] text-[#443E7C]">
</div>

<div class="flex flex-row w-full justify-between items-start my-10 z-20">
  <div class="flex flex-col justify-start items-start px-10">
    <h1 class="font-rubik font-[700] text-[24px] text-[#443E7C]">Filter</h1>
    <div class="w-[331px] h-[755px] bg-[#D5DAF7] rounded-lg px-10 py-5">
      <div class="flex flex-col justify-start items-start cursor-pointer" id="anjing">
        <h1 class="font-rubik font-[300] text-[20px] text-[#4C4C4C] my-5">Perawatan Anjing</h1>
        <div id="dropdown-1" class=" flex pl-5 flex-col justify-start items-start gap-5">
  
        </div>
      </div>
  
      <div class="flex flex-col justify-start items-start cursor-pointer" id="kucing">
        <h1 class="font-rubik font-[300] text-[20px] text-[#4C4C4C] my-5">Perawatan Kucing</h1>
        <div id="dropdown-2" class=" flex pl-5 flex-col justify-start items-start gap-5">
  
        </div>
      </div>    
    </div>
  </div>

  <div class="flex flex-col justify-center items-center w-full gap-20">
    <div class="flex flex-row justify-end items-center w-full gap-x-5">
      <label for="sort" class="font-rubik font-[400] text-[24px] text-[#443E7C]">Sort By</label>
      <select name="sort" id="sort" class="w-[250px] h-[50px] rounded-xl border border-[#443E7C] px-5 py-2 font-rubik font-[400] text-[18px] text-[#443E7C]">
        <option value="1">Terbaru</option>
        <option value="2">Terlama</option>
      </select>
    </div>
    <div class="grid grid-cols-4 gap-20 grid-flow-row w-full ">
      @for ($i = 0; $i < 8; $i++)
        <div class="flex flex-col w-[288px] justify-center items-center px-5 shadow-lg py-5 rounded-md cursor-pointer">
          <div class="w-full h-[213px]">
            <img src="/images/product.png" class="w-full h-full object-cover" alt="">
          </div>
          <p class="font-rubik font-[300] text-[20px] text-black text-left px-2">
            400g (0.9lb) Royal Canin Mother & Babycat Dry Food for Kittens Up to 12 Months
          </p>
          <div class="w-full flex justify-start items-center">
            <p class="font-rubik font-[400] text-left px-2 text-[24px]">
              Rp 600.000
            </p>
          </div>
          <div class="w-full flex justify-start items-center">
            <p class="font-rubik font-[300] text-left px-2 text-[18px]">
              ulasan 1k
            </p>
          </div>
        </div>
      @endfor
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