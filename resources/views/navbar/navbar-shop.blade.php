<script type="module">

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  
  $(document).ready(function () {

  })
  
  </script>
  
  <nav class="bg-white z-[99999] border-gray-200 w-full fixed top-0 dark:bg-gray-900">
    <div class="max-w flex items-center justify-between mx-auto px-6 py-4 h-16 sticky">
      <a href="/landing" class="flex items-center">
        <img src="/images/SeAn.png" class="h-8 mr-3"/>
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SeAn</span>
      </a>
  
      <div class="flex items-center md:order-2">
        <div class="flex flex-row gap-x-5">
          <a href="/cart">
            <div>
              <img class="mt-1 w-8 h-8" src="/images/cart.png" alt="cart" class="w-full h-full object-cover rounded-full">
            </div>
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-purple-400 hover:bg-red-900 text-white font-bold py-2 px-4 rounded">
                {{ __('Log Out') }}
            </button>
          </form>
        </div>
      </div>
  
      <div class="items-center justify-center hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                <a href="/home" 
                   @class([
                       'block py-2 pl-3 pr-4 text-gray-900 rounded',
                       'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
                       'text-blue-700' => request()->is('home')
                   ])>
                   Home
                </a>
            </li>
            <li>
                <a href="/shop" 
                   @class([
                       'block py-2 pl-3 pr-4 text-gray-900 rounded',
                       'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
                       'text-blue-700' => request()->is('shop')
                   ])>
                   Shop
                </a>
            </li>
            <li>
                <a href="/academy" 
                   @class([
                       'block py-2 pl-3 pr-4 text-gray-900 rounded',
                       'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
                       'text-blue-700' => request()->is('academy')
                   ])>
                   Academy
                </a>
            </li>
            <li>
                <a href="/consult" 
                   @class([
                       'block py-2 pl-3 pr-4 text-gray-900 rounded',
                       'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
                       'text-blue-700' => request()->is('consult')
                   ])>
                   Consult
                </a>
            </li>
            <li>
                @php
                $user = auth()->user();
                if ($user->role_id == 3) {
                    $adminClass = request()->is('admin') ? 'text-blue-700' : '';
                    echo "<a href='/admin' id='admin' class='block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 $adminClass'>Admin</a>";
                } else if ($user->role_id == 2) {
                    $userOrdersClass = request()->is('user-orders') ? 'text-blue-700' : '';
                    echo "<a href='/user-orders' id='user' class='block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 $userOrdersClass'>Orders</a>";
                }
                @endphp
            </li>
        </ul>
    </div>
    
    </div>
  </nav>
  
  






  {{-- <div class=" grid grid-cols-5 gap-10 z-50">
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

    @php
      $user = auth()->user();
      if ($user->role_id == 3) {
        echo '<a href="/admin" id="admin" class="font-rubik font-[400] text-black text-[30px]">
                Admin
              </a>';
      } else if ($user->role_id == 2) {
        echo '<a href="/user-orders" id="user" class="font-rubik font-[400] text-black text-[30px]">
                Orders
              </a>';
      }
    @endphp
    
  </div>

  <div class="  flex flex-row gap-x-5 z-50">
    <a href="/cart">
      <div class="w-[65px] h-[67px]">
        <img src="/images/cart.png" alt="cart" class="w-full h-full object-cover rounded-full">
      </div>
    </a>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="px-10 py-2 rounded-xl bg-[#443E7C] font-rubik font-[400] text-white text-[30px] flex justify-center items-center">
          {{ __('Log Out') }}
      </button>
  </form>
  </div> --}}
{{-- 
@php
$user = auth()->user();
if ($user->role_id == 3) {
  echo '<li><a href="/admin" id="admin" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Admin</a></li>';
} else if ($user->role_id == 2) {
  echo '<li><a href="/user-orders" id="user" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Orders</a></li>';
}
@endphp --}}