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
            console.log("url", url);
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


    // window.Echo.private(`webhook-notification.${consultation_id}`)
    // .listen('.MessageNotification', (e) => {
    //   console.log("BROADCASTING WOYYYYYYY");
    //   console.log("status", e.message);
    //   if(e.message == 'settled' || e.message == 'pending')
    //   {
    //     let url = '';
    //     $.ajax({
    //       url: '/payment-status/' + consultation_id,
    //       method: 'GET',
    //       headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    //         'Accept': 'application/json',
    //       },
    //       success: function(data)
    //       {
    //         url = data.payment_url;
    //         console.log("url", url);
    //         window.open(url, '_blank');
    //       }
    //     })

      
    //     $('#button-pay').addClass('hidden');
    //     $('#button-process').removeClass('hidden');
    //     $('#button-consult').addClass('hidden');
    //   }
    //   else if(e.message == 'paid')
    //   {
    //     $('#button-pay').addClass('hidden');
    //     $('#button-process').addClass('hidden');
    //     $('#button-consult').removeClass('hidden');
    //   }
    // });

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

@include('navbar.navbar-login')

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