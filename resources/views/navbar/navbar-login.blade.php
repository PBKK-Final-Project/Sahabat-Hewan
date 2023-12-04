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
@include('navbar.navbar')
{{-- <div id="toast-interactive" class="mt-16 w-full max-w-[30rem] p-4 mx-auto text-gray-500 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-400 z-40" role="alert">
  <div class="flex">
      <div class="ml-3 text-sm font-medium">
          <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white" >Hi, Aelita Stones!</span>
          <div class="grid mt-4 grid-cols-2 gap-2">
              <div>
                  <a href="#" class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 bg-purple-400 hover:bg-purple-500">Your Points: 3000</a>
              </div>
              <div>
                  <a href="#" class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Exchange</a> 
              </div>
          </div>    
      </div>
      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white items-center justify-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-interactive" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
      </button>
  </div>
</div> --}}

<div class=" w-full flex flex-col fixed top-0 z-40">
<div class="pt-16">
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
</div>
</div>
{{-- 
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
</nav> --}}