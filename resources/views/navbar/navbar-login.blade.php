<script type="module">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(document).ready(function () {
    $.ajax({
      url: '/me',
      method: 'GET',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': 'application/json',
      },
      success: function(data)
      {
        console.log('user data', data);
        $('#username').html(data.data.name);
        // add <img> tag to #user-profile
        $('#user-profile').html('<img src="' + '/storage/product/images/' + data.data.avatar + '" class="w-full h-full object-cover rounded-full" alt="">');
        $('#user-point').html(data.data.point);
      },
      error: function(error)
      {
        console.log('error', error);
      }
    })
  })
</script>

<nav class=" w-full flex flex-col fixed top-0 z-40">
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
      <a href="/home" class="font-rubik font-[400] text-black text-[30px]">
        Home
      </a>
      <a href="/shop" class="font-rubik font-[400] text-black text-[30px]">
        Shop
      </a>
      <a href="/academy" class="font-rubik font-[400] text-black text-[30px]">
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
      <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="flex w-[180px] h-[43px]  bg-[#443E7C] rounded-lg justify-center items-center font-rubik text-[30px] text-white  font-[400]">
              {{ __('Log Out') }}
          </button>
      </form>
    </div>
  </div>
  
  <div class="w-[50%] h-[146px] bg-[#B9B7EA] mx-auto rounded-b-[30px] flex flex-row justify-center items-center gap-x-20  py-5 px-12">
    <div class="flex flex-row justify-between items-center gap-x-5 ">
      <div class="w-[82px] h-[82px] rounded-full bg-white" id="user-profile"></div>
      <h1 class="font-roboto font-[700] text-[32px] text-black capitalize" id="username"></h1>
    </div>
    <div class="w-[3px] h-full bg-black  mx-auto"></div>
    <div class="flex flex-col justify-center items-start ">
      <h1 class="font-roboto font-[700] text-[25px] text-black">Your Point</h1>
      <div class="flex flex-row justify-between items-center gap-x-5">
        <div class="w-[162px] h-[46px] flex justify-center items-center font-roboto font-[700] text-[25px] text-black  bg-white rounded-lg" id="user-point">
          
        </div>
        <div class="w-[162px] h-[46px] flex justify-center items-center font-roboto font-[700] text-[25px] text-[#B9B7EA] bg-black rounded-lg">
          Exchange
        </div>
      </div>
    </div>
  </div>
</nav>