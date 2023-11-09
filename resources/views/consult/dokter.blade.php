@extends('layouts.mainLayout')
@section('content')

<script type="module">

$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $(document).ready(function () {
    let consultation_id = $('#consultation-id').val();
    console.log('consultation id: ' + consultation_id);


    window.Echo.private(`private-notification.${consultation_id}`)
    .listen('.MessageNotification', (e) => {
      console.log("BROADCASTING WOYYYYYYY");
      console.log("status", e.pesan);
      if(e.pesan == 'settled' || e.pesan == 'pending')
      {
        let url = '';
        $.ajax({
          url: '/payment-status/' + consultation_id,
          method: 'GET',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json',
          },
          success: function(data)
          {
            url = data.payment_url;
            window.open(url, '_blank');
          }
        })

      
        $('#button-pay').addClass('hidden');
        $('#button-process').removeClass('hidden');
        $('#button-consult').addClass('hidden');
      }
      else if(e.pesan == 'paid')
      {
        $('#button-pay').addClass('hidden');
        $('#button-process').addClass('hidden');
        $('#button-consult').removeClass('hidden');
      }
    });

    $.ajax({
      url: '/payment-status/' + consultation_id,
      method: 'GET',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': 'application/json',
      },
      success: function(data)
      {
        console.log("status data woy", data.status);
        if(data.status == 'paid')
        {
          $('#button-pay').addClass('hidden');
          $('#button-process').addClass('hidden');
          $('#button-consult').removeClass('hidden');
        }
        else if(data.status == 'settled')
        {
          $('#button-pay').addClass('hidden');
          $('#button-process').removeClass('hidden');
          $('#button-consult').addClass('hidden');
        }
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });

      $('#button-pay').click(function(){
        // get consultation id
        console.log('consultation id: ' + consultation_id);
        $.ajax({
          url: '/payment/' + consultation_id,
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json',
          },
          success: function(data)
          {
            console.log(data);
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        })
      })

      $('#button-consult').click(function()
      {
        window.location.href = '/chat';
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

<input type="hidden" value="{{$consultation->id}}" id="consultation-id">

<div class="mt-[300px] py-6 mx-auto w-[90%] bg-[#D5DAF7] rounded-3xl">
  <div class="w-[50%] mx-auto bg-white shadow-md px-10 py-5 font-rubik font-[700] text-center text-[80px] flex justify-center items-center capitalize rounded-3xl">
    Doctors Detail
  </div>
  <div class="w-[90%] mx-auto flex justify-center items-center gap-x-10 mt-10">
    <div class="w-[400px] h-[536px] bg-[#B9B7EA]  rounded-xl bg-[url('/storage/images/{{$consultation->dokters->avatar}}')] bg-contain bg-no-repeat p-2 flex justify-center items-center">
      <img src="/storage/images/{{$consultation->dokters->avatar}}" class="objec-contain bg-no-repeat" alt="">
    </div>
    <div class="w-[884px] h-[536px] bg-white p-5 rounded-xl">
      <div class="w-full h-full bg-[#F2F2F2] rounded-xl border flex flex-col justify-start items-start gap-5 px-5 py-5">
        <div class="shadow-md px-5 py-2 bg-white rounded-xl font-inter font-[400] text-[30px] text-black">
          Nama: {{$consultation->dokters->name}}
        </div>
        <div class="shadow-md px-5 py-2 bg-white rounded-xl font-inter font-[400] text-[30px] text-black">
          Email: {{$consultation->dokters->email}}
        </div>
      </div>
    </div>
  </div>

  <div class="w-[90%] mx-auto flex justify-center items-center gap-x-10 mt-10 px-24" id="map">
    <div id="map-address" class="w-[50%] bg-white rounded-xl px-5 py-2 font-inter font-[600] text-[30px] text-black">
      {{$consultation->dokters->alamat}}
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
    <div class="px-5 py-2 bg-black text-white rounded-xl font-inter font-[700] text-[30px] cursor-pointer" id="button-pay">
      Pay
    </div>
    <div class="px-5 hidden py-2 bg-yellow-500 text-white rounded-xl font-inter font-[700] text-[30px] cursor-pointer" id="button-process">
      Processing
    </div>
    <div class="px-5 hidden py-2 bg-green-500 text-white rounded-xl font-inter font-[700] text-[30px] cursor-pointer" id="button-consult">
      Consult Now !
    </div>
  </div>
</div>


@endsection 