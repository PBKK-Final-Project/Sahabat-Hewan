
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

    let type = $("#type").val();
    console.log("type data ", type);

    $.ajax({
      url: '/create-type',
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': 'application/json',
      },
      data: {
        type: type,
      },
      success: function(response)
      {
        console.log(response);
        alert('Berhasil menambahkan tipe');
        location.reload();
      },
      error: function(error)
      {
        console.log(error);
        alert('Gagal menambahkan tipe');
      }
    })
  });

  for(let i=1; i <= {{$types->count()}}; i++)
  {
    $('#btn-delete-' + i).click(function(e) {
      e.preventDefault();
      let type_id = $('#type-id-' + i).val();
      console.log(type_id);

      $.ajax({
        url: '/delete-type/' + type_id,
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          'Accept': 'application/json',
        },
        success: function(response)
        {
          console.log(response);
          alert('Berhasil menghapus tipe');
          location.reload();
        },
        error: function(error)
        {
          console.log(error);
          alert('Gagal menghapus tipe');
        }
      })
    });
  }

  for(let i=1; i <= {{$types->count()}}; i++)
  {
    $('#button-' + i).click(function (e) { 
      e.preventDefault();
      $('#edit-type').removeClass('hidden');
  
      let type_id = $('#type-id-' + i).val();
      console.log(type_id); 


      $('#btn-edit').click(function()
      {
        let type = $("#type-update").val();
        console.log("type data ", type);

        $.ajax({
          url: '/update-type/' + type_id,
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json',
          },
          data: {
            type: type,
          },
          success: function(response)
          {
            console.log(response);
            alert('Berhasil mengedit tipe');
            location.reload();
          },
          error: function(error)
          {
            console.log(error);
            alert('Gagal mengedit tipe');
          }
        })
      })
    });
  }

  $('#x').click(function (e) { 
    e.preventDefault();
    $('#edit-type').addClass('hidden');
  });
})
</script>

<div class="flex mx-auto w-[40rem] ">
  {{-- create input and button --}}
  <div class="flex flex-col gap-y-5 w-full">
    <div class="flex flex-col gap-y-2">
      <label for="type" class="font-rubik font-[400] text-[30px]">
        Type
      </label>
      <input type="text" name="type" id="type" class="border-2 border-gray-500 rounded-lg px-5 py-2">
    </div>

    <button type="submit" id="btn-create" class="px-10 py-2 rounded-xl bg-[#443E7C] font-rubik font-[400] text-white text-[30px] flex justify-center items-center">
      Create
    </button>
  </div>

</div>

<div class="w-full mt-10 px-10 grid grid-cols-3 gap-x-20 gap-y-20 justify-items-center items-center grid-flow-row">
  @php
    $i = 1;
  @endphp
  @foreach ($types as $type)
    <div class="flex flex-row justify-between px-10 py-5 items-start w-[600px] h-[150px] bg-gray-300 shadow-xl rounded-xl">
      <h1 class="font-rubik text-black font-[500] text-[24px]">{{$type->type}}</h1>
      <input type="hidden" value="{{$type->id}}" id="type-id-{{$i}}">
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
<div class="fixed transition-all duration-150 ease-in-out top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden " id="edit-type">
  <div class="flex flex-col justify-center items-center w-full h-full">
    <div class="flex flex-col justify-center items-center w-[40rem] px-10 py-5 bg-white rounded-xl">
      <h1 class="font-rubik font-[400] text-[30px] text-black">Edit Type</h1>
      <div class="flex flex-col gap-y-5 w-full relative">
        <div class="flex flex-col gap-y-2">
          <label for="type" class="font-rubik font-[400] text-[30px]">
            Type
          </label>
          <input type="text" name="type" id="type-update" class="border-2 border-gray-500 rounded-lg px-5 py-2" value="">
        </div>
        <button type="submit" id="btn-edit" class="px-10 py-2 rounded-xl bg-[#443E7C] font-rubik font-[400] text-white text-[30px] flex justify-center items-center">
          Edit
        </button>
        <p class="absolute -right-7 -top-16 cursor-pointer font-rubik text-black font-[700] text-[20px]" id="x">X</p>
      </div>
    </div>
  </div>
</div>