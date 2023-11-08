@extends('layouts.mainLayout')
@section('content')

<script type="module">

$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $(document).ready(function () { 
    var dokter_id = $('#dokter-detail').val();
    let user_id = 0;
    $.ajax({
        url: '/dokter-detail-data/'+dokter_id, 
        method: 'GET',
        success: function(data)
        {
          user_id = data.data.id;

          // split the address and add "+" between the words
          let address = data.data.alamat.split(" ").join("+");
          $.ajax({
            url: 'https://www.google.com/maps/search/?api=1&query=' + address,
            method: 'GET',
            success: function(data)
            {
              $('#map').html(data);
              // add iframe to the div with id map-address
              $('#map-address').html($('#map iframe'));
            },
            error: function(xhr, status, error) {
              console.error(error);
            }
          })
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });

  });

</script>

<nav class="fixed top-0 w-full z-50">
  <div class="w-full flex flex-col z-40">
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
  </div>
</nav>

<input type="hidden" value="{{$dokter->id}}" id="dokter-detail">

<div class="mt-[300px] py-6 mx-auto w-[90%] bg-[#D5DAF7] rounded-3xl">
  <div class="w-[50%] mx-auto bg-white shadow-md px-10 py-5 font-rubik font-[700] text-center text-[80px] flex justify-center items-center capitalize rounded-3xl">
    Doctors Detail
  </div>
  <div class="w-[90%] mx-auto flex justify-center items-center gap-x-10 mt-10">
    <div class="w-[400px] h-[536px] bg-[#B9B7EA]  rounded-xl bg-[url('/storage/images/{{$dokter->avatar}}')] bg-contain bg-no-repeat p-2 flex justify-center items-center">
      <img src="/storage/images/{{$dokter->avatar}}" class="objec-contain bg-no-repeat" alt="">
    </div>
    <div class="w-[884px] h-[536px] bg-white p-5 rounded-xl">
      <div class="w-full h-full bg-[#F2F2F2] rounded-xl border flex flex-col justify-start items-start gap-5 px-5 py-5">
        <div class="shadow-md px-5 py-2 bg-white rounded-xl font-inter font-[400] text-[30px] text-black">
          Nama: {{$dokter->name}}
        </div>
        <div class="shadow-md px-5 py-2 bg-white rounded-xl font-inter font-[400] text-[30px] text-black">
          Email: {{$dokter->email}}
        </div>
      </div>
    </div>
  </div>

  <div class="w-[90%] mx-auto flex justify-center items-center gap-x-10 mt-10 px-24" id="map">
    <div id="map-address" class="w-[50%] bg-white rounded-xl px-5 py-2 font-inter font-[600] text-[30px] text-black">
      {{$dokter->alamat}}
    </div>
    <div id="map-address" class="w-[50%] bg-white rounded-xl px-5 py-2 font-inter font-[600] text-[30px] text-black">
      Certification
    </div>
  </div>

  <div class="w-[306px] h-[248px] mx-auto mt-16 bg-white rounded-3xl flex flex-col justify-center items-center">
    <h1 class="font-inter font-[700] text-[30px] text-black">
      Estimated Total
    </h1>
    <p class="font-inter font-[300] text-[30px] italic text-black">
      Rp. 20,000.00
    </p>
    <div class="w-full h-[2px] bg-black my-5"></div>
    <button class="px-5 py-2 bg-black text-white rounded-xl font-inter font-[700] text-[30px]">
      Pay
    </button>
  </div>
</div>


@endsection 