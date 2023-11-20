@include('admin.admin-dashboard');

<div class="grid grid-cols-3 w-full  justify-items-center items-center gap-x-5 px-5 py-5 gap-y-14 grid-flow-row">

  @foreach ($products as $product)
    <div class="flex flex-col w-full bg-gray-200 shadow-md rounded-xl px-5 py-5 justify-start items-start gap-y-5">
      <div class="w-full h-[200px]">
        <img src="/storage/product/images/{{$product->image}}" alt="product" class="w-full h-[200px] object-contain">
      </div>
      <h1 class="font-rubik font-[700] text-black text-[24px]">{{$product->name}}</h1>
      <p class="font-rubik font-[400] text-black text-[20px]">
        {{$product->description}}
      </p>
      <div class="flex flex-row gap-x-10 w-full justify-center items-center">
        <a href="/edit-product/{{$product->id}}" class="bg-blue-500 px-6 py-3 rounded-xl font-[400] font-rubik text-white text-[24px]">Edit Product</a>
        <form action="/delete-product/{{$product->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="bg-red-500 px-6 py-3 rounded-xl font-[400] font-rubik text-white text-[24px]">Delete Product</button>
        </form>
      </div>
    </div>
  @endforeach

</div>