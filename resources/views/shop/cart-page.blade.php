
@extends('layouts.mainLayout')
@section('content')

<script type="module">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $(document).ready(function () {

    
    @php
        $j = 0;
      @endphp
      for (let i = 0; i < {{count($carts)}}; i++) {
        $('#btn-remove-' + i).click(function (e) { 
          e.preventDefault();
          let idCart = $('#input-remove-' + i).val();
          console.log("id cart: " + idCart);
          $.ajax({
            url: '/cart/' + idCart,
            method: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Accept': 'application/json',
            },
            success: function (response) {
              console.log(response);
              alert('Berhasil dihapus dari keranjang');
              location.reload();
            },
            error: function (response) {
              console.log(response);
              alert('Gagal dihapus dari keranjang');
            }
          });
        });
        @php
          $j++;
        @endphp
      }
  })
</script>

@include('navbar.navbar-shop')

<div class="w-full bg-[#D5DAF7] h-[200px] flex justify-center items-center mt-[200px]">
  <div class="w-[50%] mx-auto">
    <h1 class="font-rubik mx-auto text-center  font-[600] text-[24px] text-black">
      Hello {{$user->name}}
    </h1>
    <p class="font-rubik mx-auto text-center  font-[400] text-[30px] text-black">
      You have {{count($carts)}} items in your shopping cart
    </p>
  </div>
</div>

<div class="flex w-full flex-row justify-between px-10 py-2 gap-x-10 items-start ">
  <div class="w-[60%] gap-y-5 flex flex-col">
    @php
      $total = 0;
      $idBtnRemove = 0;
    @endphp
    @foreach ($carts as $cart)
      <div class="flex  flex-row justify-start items-start border gap-x-10 border-black rounded-lg px-5 py-3">
        <div class="w-[250px] h-[250px] rounded-lg">
          <img src="/storage/images/product.png" alt="product" class="w-full object-contain">
        </div>
        <div class="basis-1/3 flex flex-col gap-y-3 justify-start items-start">
          <p class="font-rubik font-[400] text-black text-[20px]">
            Nama: {{$cart->products->name}}
          </p>
          <p class="font-rubik font-[400] text-black text-[20px]">
            Kategori: {{$cart->products->categories->category}}
          </p>
          <p class="font-rubik font-[400] text-black text-[20px]">
            Harga: Rp {{number_format($cart->products->price, 0, ',', '.')}}
          </p>
          <p class="font-rubik font-[400] text-black text-[20px]">
            Quantity: {{$cart->quantity}}
          </p>
          <p class="font-rubik font-[400] text-black text-[20px]">
            Desc: {{$cart->products->description}} 
          </p>
        </div>
  
        <button class="font-rubik font-[600] rounded-xl bg-red-600 text-white text-[30px] px-10 py-2" id="btn-remove-{{$idBtnRemove}}">
          Remove
        </button>
        <input type="hidden" id="input-remove-{{$idBtnRemove}}" value="{{$cart->id}}">
      </div>
        @php
          $total += $cart->products->price * $cart->quantity;
          $idBtnRemove++;
        @endphp
    @endforeach

  </div>

  <div class="flex   w-[40%] flex-col gap-y-3 justify-center items-center">
    <h1 class="font-rubik mx-auto text-center  font-[600] text-[24px] text-black">
      Cart Summary
    </h1>
    <h1 class="font-rubik mx-auto text-center  font-[400] text-[24px] text-black">
      Total | Checkout | Payment
    </h1>
    <div class="w-full h-[1px] bg-black"></div>
    <p class="font-rubik mx-auto text-center  font-[600] text-[24px] text-black">
      Total: Rp {{number_format($total, 0, ',', '.')}}
    </p>
    <p class="font-rubik mx-auto text-center  font-[600] text-[24px] text-black">
      Alamat: Jember 
    </p>
    <button class="font-rubik font-[600] rounded-xl bg-blue-600 text-white text-[30px] px-10 py-2">
      Make Payment
    </button>
  </div>
</div>

@endsection