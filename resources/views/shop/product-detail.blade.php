@extends('layouts.mainLayout')
@section('content')

<script type="module">

let anjingOnclick = false;
let kucingOnclick = false;
let inputStock = 0;
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

    $('#btn-tambah').click(function (e) { 
      e.preventDefault();
      inputStock = parseInt($('#input-stock').val());
      inputStock += 1;
      $('#input-stock').val(inputStock);
    });

    $('#btn-kurang').click(function (e) { 
      e.preventDefault();
      inputStock = parseInt($('#input-stock').val());
      if(inputStock > 1)
      {
        inputStock -= 1;
        $('#input-stock').val(inputStock);
      }
    });
  })

</script>

@include('navbar.navbar-shop')


<div class="flex mt-[200px] flex-row justify-between items-start px-10 w-[90%] mx-auto  py-5 ">
  <div class="flex flex-col w-[331px] justify-center items-center px-5 shadow-lg py-5 rounded-md cursor-pointer">
    <div class="w-full h-[331px]">
      <img src="/images/product.png" class="w-full h-full object-contain" alt="">
    </div>
    <div class="w-full flex justify-start items-center">
      <p class="font-rubik font-[300] text-left px-2 text-[18px]">
        ulasan 1k
      </p>
    </div>
  </div>

  <div class="flex basis-1/2 flex-col gap-y-10 justify-start items-start">
    <p class="font-rubik font-[300] text-[24px] text-black">
      400g (0.9lb) Royal Canin Mother & Babycat Dry Food for Kittens Up to 12 Months
    </p>
    <p class="font-rubik font-[400] text-[32px] text-black">
      Rp 600.000
    </p>
    <div class="flex flex-col justify-start gap-y-2 items-start w-full">
      <p class="font-rubik pl-5 font-[600] text-[24px] text-[#443E7C]">
        Detail
      </p>
      <div class="w-full bg-[#A3A3A3] h-[2px]"></div>
      <div class="flex flex-col w-full gap-y-5 justify-start items-start">
        <p class="font-rubik font-[300] text-black text-[20px]">
          Kondisi: Baru
        </p>
        <p class="font-rubik font-[300] text-black text-[20px]">
          Min. Pemesanan: 1
        </p>
        <p class="font-rubik font-[300] text-black text-[20px]">
          Etalase: Semua Etalase
        </p>
        <p class="font-rubik font-[300] text-black text-[20px]">
          Stock: 100
        </p>
        <p class="font-rubik font-[300] text-black text-[20px]">
          Deskripsi: <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque ad libero distinctio natus assumenda mollitia doloribus, veniam beatae ratione molestiae fugit? Labore delectus dolor ab? Porro necessitatibus incidunt beatae alias minima velit repudiandae ab impedit adipisci? Aspernatur est tempora vero voluptas esse. Exercitationem omnis sint similique voluptatum labore quis? Voluptates blanditiis fuga tenetur soluta quibusdam voluptatibus quis ratione vel? Quia modi temporibus necessitatibus earum provident pariatur enim dolorum expedita veniam molestiae, minima, dolor alias, sunt quo in nostrum veritatis voluptatum! Delectus blanditiis voluptates magnam temporibus mollitia exercitationem, inventore qui accusantium saepe quo iste harum enim earum eaque perferendis vero numquam.
        </p>
      </div>
    </div>
  </div>

  <div class="flex flex-col justify-center items-start border gap-y-10 px-5 py-2 border-black rounded-xl w-[350px] h-[400px]">
    <div class="w-full flex flex-row justify-center items-center gap-x-3">
      <img src="/images/product.png" class="w-[120px] object-contain " alt="">
      <p class="font-rubik font-[300] text-[20px] text-black">Mother & Babycat Dry Food</p>
    </div>
    <div class="w-full h-[1px] bg-[#443E7C] "></div>
    {{-- stock input --}}
    <div class="flex flex-row justify-between items-center w-full">
      <p class="font-rubik font-[300] text-[20px] text-black">Stock: 3</p>
      <div class="flex flex-row justify-between items-center gap-x-2">
        <button class="w-[30px] h-[30px] rounded-full bg-[#443E7C] flex justify-center items-center" id="btn-kurang">
          <p class="font-rubik font-[300] text-[20px] text-white">-</p>
        </button>
        <input type="text" id="input-stock" class="w-[100px] h-[30px] rounded-lg border border-[#443E7C] px-5 py-2 font-rubik font-[300] text-[20px] text-[#443E7C] text-center" value="1">
        <button class="w-[30px] h-[30px] rounded-full bg-[#443E7C] flex justify-center items-center" id="btn-tambah">
          <p class="font-rubik font-[300] text-[16px] text-white">+</p>
        </button>
      </div>
    </div>
    {{-- add buy button and cart button --}}
    <div class="flex flex-row justify-between items-center w-full">
      <button class="w-[150px] h-[50px] rounded-xl bg-white flex border border-[#443E7C] justify-center items-center">
        <p class="font-rubik font-[300] text-[20px] text-[#443E7C]">Buy Now</p>
      </button>
      <button class="w-[150px] h-[50px] rounded-xl bg-[#443E7C] flex justify-center items-center">
        <p class="font-rubik font-[300] text-[20px] text-white">Keranjang</p>
      </button>
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