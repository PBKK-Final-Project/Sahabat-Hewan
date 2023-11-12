<nav class="fixed  top-0 w-full h-[100px] shadow-md bg-white flex flex-row justify-between px-10 py-5 items-center z-50">
  <div class=" flex flex-row justify-center items-end gap-x-5 z-50">
    <div class="w-[80px] h-[80px]">
      <img src="/images/SeAn.png" class="w-full h-full object-cover rounded-full" alt="">
    </div>
    <h1 class="font-roboto font-[400] text-[40px] text-black">
      SeAn
    </h1>
  </div>

  <div class=" grid grid-cols-4 gap-10 z-50">
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
  </div>
</nav>