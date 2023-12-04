@include('admin.admin-dashboard');

<form action="/edit-product/{{$product->id}}" method="POST" class="w-[90%] flex flex-col gap-y-5 mx-auto px-5 py-5 mt-24" enctype="multipart/form-data">
  @csrf
  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="name" class="block text-[1.5rem] font-medium text-gray-700">Product Name</label>
      <input value="{{$product->name}}" type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-[1.5rem] border-gray-300 rounded-md">
    </div>
    <div class="w-[50%]">
      <label for="shortname" class="block text-[1.5rem] font-medium text-gray-700">Shortname</label>
      <input value="{{$product->shortname}}" type="text" name="shortname" id="shortname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-[1.5rem] border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="category" class="block text-[1.5rem] font-medium text-gray-700">Category</label>
      <select id="category" name="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-[1.5rem]">
        <option value="{{$product->categories->id}}">{{$product->categories->category}}</option>
        @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->category}}</option>
        @endforeach
      </select>
    </div>

    <div class="w-[50%]">
      <label for="type" class="block text-[1.5rem] font-medium text-gray-700">Type</label>
      <select id="type" name="type_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-[1.5rem]">
        <option value="{{$product->types->id}}">{{$product->types->type}}</option>
        @foreach ($types as $type)
          <option value="{{$type->id}}">{{$type->type}}</option>  
        @endforeach
      </select>
    </div>
  </div>

  {{-- textarea for description --}}
  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="description" class="block text-[1.5rem] font-medium text-gray-700">Description</label>
      <div class="mt-1">
        <textarea value="{{$product->description}}" id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-[1.5rem] border-gray-300 rounded-md">
          {{$product->description}}
        </textarea>
      </div>
    </div>

    <div class="w-[50%]">
      <label for="condition" class="block text-[1.5rem] font-medium text-gray-700">Condition</label>
      <div class="mt-1">
        <textarea value="{{$product->condition}}" id="condition" name="condition" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-[1.5rem] border-gray-300 rounded-md">
          {{$product->condition}}
        </textarea>
      </div>
    </div>
  </div>

  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="price" class="block text-[1.5rem] font-medium text-gray-700">Price</label>
      <input value="{{$product->price}}" type="number" name="price" id="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-[1.5rem] border-gray-300 rounded-md">
    </div>
    <div class="w-[50%]">
      <label for="stock" class="block text-[1.5rem] font-medium text-gray-700">Stock</label>
      <input value="{{$product->stock}}" type="number" name="stock" id="stock" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-[1.5rem] border-gray-300 rounded-md">
    </div>
  </div>

  {{-- upload image --}}
  <div class="w-full flex flex-row gap-x-5 justify-start items-center">
    <div class="w-[50%] flex flex-col">
      <label for="image" class="block text-[1.5rem] font-medium text-gray-700">Image</label>
      <input value="/storage/product/images/{{$product->image}}" type="file" name="image" id="image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-[1.5rem] border-gray-300 rounded-md">
      {{-- show image --}}
      <div class="w-full flex flex-row gap-x-5 justify-start items-center mt-5">
        <div class="w-[50%]">
          <img src="/storage/product/images/{{$product->image}}" alt="" class="w-[50%]">
        </div>
      </div>  
    </div>
  </div>

  {{-- submit button --}}
  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-full flex flex-row gap-x-10">
      <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-[1.5rem] font-medium rounded-md text-white bg-[#3B82F6] hover:bg-[#3B82F6] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Submit
      </button>
      <a href="/products" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-[1.5rem] font-medium rounded-md text-white bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2">
        Cancel
      </a>
    </div>
  </div>
</form>

