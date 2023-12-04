
@include('admin.admin-dashboard');

<script type="module">
  
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
  // while click edit button then show edit pop up

  $('#btn-create').click(function(e){
    e.preventDefault();

    let category = $("#category").val();
    console.log("category data ", category);

    $.ajax({
      url: '/create-category',
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': 'application/json',
      },
      data: {
        category: category,
      },
      success: function(response)
      {
        console.log(response);
        alert('Berhasil menambahkan kategori');
        location.reload();
      },
      error: function(error)
      {
        console.log(error);
        alert('Gagal menambahkan kategori');
      }
    })
  });

  for(let i=1; i <= {{$categories->count()}}; i++)
  {
    $('#btn-delete-' + i).click(function(e) {
      e.preventDefault();
      let category_id = $('#category-id-' + i).val();
      console.log(category_id);

      $.ajax({
        url: '/delete-category/' + category_id,
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          'Accept': 'application/json',
        },
        success: function(response)
        {
          console.log(response);
          alert('Berhasil menghapus kategori');
          location.reload();
        },
        error: function(error)
        {
          console.log(error);
          alert('Gagal menghapus kategori');
        }
      })
    });
  }

  for(let i=1; i <= {{$categories->count()}}; i++)
  {
    $('#button-' + i).click(function (e) { 
      e.preventDefault();
      $('#edit-category').removeClass('hidden');
  
      let category_id = $('#category-id-' + i).val();
      console.log(category_id); 

      $('#btn-edit').click(function()
      {
        let category = $("#category-update").val();
        console.log("category data ", category);

        $.ajax({
          url: '/update-category/' + category_id,
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json',
          },
          data: {
            category: category,
          },
          success: function(response)
          {
            console.log(response);
            alert('Berhasil mengedit kategori');
            location.reload();
          },
          error: function(error)
          {
            console.log(error);
            alert('Gagal mengedit kategori');
          }
        })
      })
    });
  }

  $('#x').click(function (e) { 
    e.preventDefault();
    $('#edit-category').addClass('hidden');
  });
})
</script>

<div class="flex pt-28 mx-auto w-[40rem] ">
  {{-- create input and button --}}
  <div class="flex flex-col gap-y-5 w-full">
    <div class="flex flex-col gap-y-2">
      <label for="category" class="font-rubik font-[400] text-[30px]">
        Category
      </label>
      <input type="text" name="category" id="category" class="border-2 border-gray-500 rounded px-5 py-2">
    </div>
    {{-- <button type="submit" id="btn-create" class="px-10 py-2 rounded-xl bg-[#443E7C] font-rubik font-[400] text-white text-[30px] flex justify-center items-center">
      Create
    </button> --}}
    <button type="submit" id="btn-create" class="font-medium btn bg-purple-400 h-10 px-6 hover:bg-yellow-800 text-white rounded">
    Create
  </button>
  </div>
</div>

<div class="w-full mt-10 px-10 grid grid-cols-3 gap-x-20 gap-y-20 justify-items-center items-center grid-flow-row">
  @php
    $i = 1;
  @endphp
  @foreach ($categories as $category)
    <div class="flex flex-row justify-between px-10 py-5 items-start w-[600px] h-[150px] bg-gray-300 shadow-xl rounded-xl">
      <h1 class="font-rubik text-black font-[500] text-[24px]">{{$category->category}}</h1>
      <input type="hidden" value="{{$category->id}}" id="category-id-{{$i}}">
      <div class="flex flex-row gap-x-5 justify-center items-center">
        <button class="bg-yellow-500 px-5 py-2 rounded-xl  text-white font-rubik font-[400] text-[20px]" id="button-{{$i}}">
          Edit
        </button>
        <button class="bg-red-500 px-5 py-2 rounded-xl  text-white font-rubik font-[400] text-[20px]" id="btn-delete-{{$i}}">
          Delete
        </button>
      </div>
    </div>
    @php
      $i++;
    @endphp
  @endforeach
</div>

{{-- create pop up to edit data  --}}
<div class="fixed transition-all duration-150 ease-in-out top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden " id="edit-category">
  <div class="flex flex-col justify-center items-center w-full h-full">
    <div class="flex flex-col justify-center items-center w-[40rem] px-10 py-5 bg-white rounded-xl">
      <h1 class="font-rubik font-[400] text-[30px] text-black">Edit Category</h1>
      <div class="flex flex-col gap-y-5 w-full relative">
        <div class="flex flex-col gap-y-2">
          <label for="category" class="font-rubik font-[400] text-[30px]">
            Category
          </label>
          <input type="text" name="category" id="category-update" class="border-2 border-gray-500 rounded-lg px-5 py-2" value="">
        </div>
        <button type="submit" id="btn-edit" class="px-10 py-2 rounded-xl bg-[#443E7C] font-rubik font-[400] text-white text-[30px] flex justify-center items-center">
          Edit
        </button>
        <p class="absolute -right-7 -top-16 cursor-pointer font-rubik text-black font-[700] text-[20px]" id="x">X</p>
      </div>
    </div>
  </div>
</div>