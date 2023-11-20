
@extends('layouts.mainLayout')
@section('content')

<script type="module">

let anjingOnclick = false;
let kucingOnclick = false;
let burungOnclick = false;
$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $(document).ready(function () {

    $('#anjing').click(function (e) { 
      e.preventDefault();
      if(anjingOnclick == false)
      {
        $('#dropdown-1').removeClass('hidden');
        anjingOnclick = true;
      }
      else
      {
        $('#dropdown-1').addClass('hidden');
        anjingOnclick = false;
      }
    });

    $('#kucing').click(function (e) { 
      e.preventDefault();
      if(kucingOnclick == false)
      {
        $('#dropdown-2').removeClass('hidden');
        kucingOnclick = true;
      }
      else
      {
        $('#dropdown-2').addClass('hidden');
        kucingOnclick = false;
      }
    });

    $('#burung').click(function (e) { 
      e.preventDefault();
      if(burungOnclick == false)
      {
        $('#dropdown-3').removeClass('hidden');
        burungOnclick = true;
      }
      else
      {
        $('#dropdown-3').addClass('hidden');
        burungOnclick = false;
      }
    });
   
    function renderProducts(products, containerId) {
      const productsContainer = document.getElementById(containerId);

      products.forEach((product) => {
        const productLink = document.createElement("a");
        productLink.href = `/product-detail/${product.id}`;

        const productCard = document.createElement("div");
        productCard.className = "flex flex-col w-[288px] justify-center items-center px-5 shadow-lg py-5 rounded-md cursor-pointer";

        const productImage = document.createElement("div");
        productImage.className = "w-full h-[213px]";
        const image = document.createElement("img");
        image.src = `/storage/product/images/${product.image}`;
        image.className = "w-full h-full object-cover";
        image.alt = product.shortname;
        productImage.appendChild(image);

        const productName = document.createElement("p");
        productName.className = "font-rubik font-[300] text-[20px] text-black text-left px-2";
        productName.textContent = product.name;

        const productPrice = document.createElement("div");
        productPrice.className = "w-full flex justify-start items-center";
        const price = document.createElement("p");
        price.className = "font-rubik font-[400] text-left px-2 text-[24px]";
        price.textContent = `Rp. ${new Intl.NumberFormat("id-ID").format(product.price)}`;
        productPrice.appendChild(price);

        const productReviews = document.createElement("div");
        productReviews.className = "w-full flex justify-start items-center";
        const reviewCount = document.createElement("p");
        reviewCount.className = "font-rubik font-[300] text-left px-2 text-[18px]";
        reviewCount.textContent = `ulasan ${product.product_reviews.length}`;
        productReviews.appendChild(reviewCount);

        productCard.appendChild(productImage);
        productCard.appendChild(productName);
        productCard.appendChild(productPrice);
        productCard.appendChild(productReviews);

        productLink.appendChild(productCard);
        productsContainer.appendChild(productLink);
      });
    }

    function filerProduct(idProd, valueId)
    {
        console.log('clicked');
        let id = $('#' + valueId).val();

        // split id to get category id and sub category id
        let idSplit = id.split('.');
        let categoryId = idSplit[0];
        let subCategoryId = idSplit[1];

        console.log('category id', categoryId);
        console.log('sub category id', subCategoryId);


        $.ajax({
          url: '/products/' + categoryId + '/' + subCategoryId,
          method: 'GET',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json',
          },
          success: function(data)
          {
            console.log('success', data.data);
            let products = data.data;
            $('#products').html('');
            renderProducts(products, 'products');
                    
          },
          error: function(error)
          {
            console.log('error', error);
          }
        })
    }

    $('#makanan_anjing').click(function (e) { 
      e.preventDefault();
      filerProduct(1, 'id-makanan-anjing');
    });

    $('#obat_anjing').click(function (e) { 
      e.preventDefault();
      filerProduct(1, 'id-obat-anjing');
    });

    $('#aksesoris_anjing').click(function (e) { 
      e.preventDefault();
      filerProduct(1, 'id-aksesoris-anjing');
    });


    $('#makanan-kucing').click(function (e) { 
      e.preventDefault();
      filerProduct(2, 'id-makanan-kucing');
    });

    $('#obat-kucing').click(function (e) { 
      e.preventDefault();
      filerProduct(2, 'id-obat-kucing');
    });

    $('#aksesoris-kucing').click(function (e) { 
      e.preventDefault();
      filerProduct(2, 'id-aksesoris-kucing');
    });


    $('#makanan-burung').click(function (e) { 
      e.preventDefault();
      filerProduct(3, 'id-makanan-burung');
    });

    $('#obat-burung').click(function (e) { 
      e.preventDefault();
      filerProduct(3, 'id-obat-burung');
    });

    $('#aksesoris-burung').click(function (e) { 
      e.preventDefault();
      filerProduct(3, 'id-aksesoris-burung');
    });

    $('#reset-filter').click(function (e) { 
      window.location.reload();
    });

    $('#sort').change(function (e) { 
      e.preventDefault();
      let sort = $('#sort').val();
      if(sort !== '')
      {
        let url = '/products-sort/' + sort;
        $.ajax({
          url: url,
          method: 'GET',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json',
          },
          success: function(data)
          {
            let products = data.data;
            console.log('url', url);
            $('#products').html('');
            renderProducts(products, 'products');
                    
          },
          error: function(error)
          {
            console.log('error', error);
          }
        })

      }
    });
    
    $('#search').keyup(function (e) { 
      e.preventDefault();
      let search = $('#search').val();
      console.log('search', search);
      search = search.replace(/\s/g, '-');
      let url = '/products-search/' + search;
      $.ajax({
        url: url,
        method: 'GET',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          'Accept': 'application/json',
        },
        success: function(data)
        {
          console.log('success', data.data);
          let products = data.data;
          console.log('url', url);
          $('#products').html('');
          renderProducts(products, 'products');
                  
        },
        error: function(error)
        {
          console.log('error', error);
        }
      })
    });
  })

</script>

@include('navbar.navbar-shop')

<input type="hidden" name="" id="user-id" value="{{Auth::user()->id}}">
<input type="hidden" name="" id="id-makanan-anjing" value="1.1">
<input type="hidden" name="" id="id-obat-anjing" value="1.2">
<input type="hidden" name="" id="id-aksesoris-anjing" value="1.3">

<input type="hidden" name="" id="id-makanan-kucing" value="2.1">
<input type="hidden" name="" id="id-obat-kucing" value="2.2">
<input type="hidden" name="" id="id-aksesoris-kucing" value="2.3">

<input type="hidden" name="" id="id-makanan-burung" value="3.1">
<input type="hidden" name="" id="id-obat-burung" value="3.2">
<input type="hidden" name="" id="id-aksesoris-burung" value="3.3">

<div class="w-[80%] mt-[150px] flex flex-row justify-center items-center mx-auto gap-x-10 my-10 z-20">
  <p class="font-rubik font-[400] text-[24px] text-[#443E7C]">Search</p>
  <input type="text" id="search" class="w-[500px] h-[50px] rounded-xl border border-[#443E7C] px-5 py-2 font-rubik font-[400] text-[24px] text-[#443E7C]">
</div>

<div class="flex flex-row w-full justify-between items-start my-10 z-20">
  <div class="flex flex-col justify-start items-start px-10">
    <h1 class="font-rubik font-[700] text-[24px] text-[#443E7C]">Filter</h1>
    <div class="w-[331px] h-[755px] bg-[#D5DAF7] rounded-lg px-10 py-5">
      <div class="flex flex-col justify-start items-start cursor-pointer" >
        <h1 class="font-rubik font-[300] text-[20px] text-[#4C4C4C] my-5" id="anjing">Perawatan Anjing</h1>
        <div id="dropdown-1" class="hidden flex pl-5 flex-col justify-start items-start gap-5">
          <p  class="font-rubik font-[300] text-[20px] text-[#4C4C4C]" id="makanan_anjing" >> Makanan Anjing</p>
          <p  class="font-rubik font-[300] text-[20px] text-[#4C4C4C]" id="obat_anjing">> Obat Anjing</p>
          <p  class="font-rubik font-[300] text-[20px] text-[#4C4C4C]" id="aksesoris_anjing">> Aksesoris Anjing</p>
        </div>
      </div>
  
      <div class="flex flex-col justify-start items-start cursor-pointer" >
        <h1 class="font-rubik font-[300] text-[20px] text-[#4C4C4C] my-5" id="kucing">Perawatan Kucing</h1>
        <div id="dropdown-2" class="hidden flex pl-5 flex-col justify-start items-start gap-5">
          <a href="#" class="font-rubik font-[300] text-[20px] text-[#4C4C4C]" id="makanan-kucing">> Makanan kucing</a>
          <a href="#" class="font-rubik font-[300] text-[20px] text-[#4C4C4C]" id="obat-kucing">> Obat kucing</a>
          <a href="#" class="font-rubik font-[300] text-[20px] text-[#4C4C4C]" id="aksesoris-kucing">> Aksesoris kucing</a>
        </div>
      </div>    

      <div class="flex flex-col justify-start items-start cursor-pointer" >
        <h1 class="font-rubik font-[300] text-[20px] text-[#4C4C4C] my-5" id="burung">Perawatan Burung</h1>
        <div id="dropdown-3" class="hidden flex pl-5 flex-col justify-start items-start gap-5">
          <a href="#" class="font-rubik font-[300] text-[20px] text-[#4C4C4C]" id="makanan-burung">> Makanan burung</a>
          <a href="#" class="font-rubik font-[300] text-[20px] text-[#4C4C4C]" id="obat-burung">> Obat burung</a>
          <a href="#" class="font-rubik font-[300] text-[20px] text-[#4C4C4C]" id="aksesoris-burung">> Aksesoris burung</a>
        </div>
      </div>    

      <button class="font-rubik font-[400] text-white text-[20px] px-10 py-2 rounded-lg bg-[#443E7C]" id="reset-filter">
        Reset Filter
      </button>
    </div>
  </div>

  <div class="flex flex-col justify-center items-center w-full gap-20">
    <div class="flex flex-row justify-end items-center w-full gap-x-5">
      <label for="sort" class="font-rubik font-[400] text-[24px] text-[#443E7C]">Sort By</label>
      <select name="sort" id="sort" class="w-[250px] h-[50px] rounded-xl border border-[#443E7C] px-5 py-2 font-rubik font-[400] text-[18px] text-[#443E7C]">
        <option value=""></option>
        <option value="1">Terbaru</option>
        <option value="2">Terlama</option>
      </select>
    </div>
    <div class="grid grid-cols-4 gap-20 grid-flow-row w-full " id="products">
      @foreach ($products as $product)
        <a href="/product-detail/{{$product->id}}">
          <div class="flex flex-col w-[288px] justify-center items-center px-5 shadow-lg py-5 rounded-md cursor-pointer" >
            <div class="w-full h-[213px]">
              <img src="/storage/product/images/{{$product->image}}" class="w-full h-full object-cover" alt="{{$product->shortname}}">
            </div>
            <p class="font-rubik font-[300] text-[20px] text-black text-left px-2">
              {{-- 400g (0.9lb) Royal Canin Mother & Babycat Dry Food for Kittens Up to 12 Months --}}
              {{$product->name}}
            </p>
            <div class="w-full flex justify-start items-center">
              <p class="font-rubik font-[400] text-left px-2 text-[24px]">
                {{-- format price in rupiah --}}
                Rp. {{ number_format($product->price, 0, ',', '.') }}
              </p>
            </div>
            <div class="w-full flex justify-start items-center">
              <p class="font-rubik font-[300] text-left px-2 text-[18px]">
                ulasan {{$product->product_reviews->count()}}
              </p>
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</div>

<footer class="flex flex-row justify-start items-start px-10 py-10 gap-x-20">
  <div class="flex flex-col gap-y-5 justify-center items-stretch ">
    <div class="flex flex-row justify-center items-end gap-x-5">
      <div class="w-[4.25rem] h-[4.25rem] ">
        <img class="w-[4.25rem] h-[4.25rem] object-contain" src="/images/Mask group.png"/>
      </div>
      <h1 class="font-Roboto font-normal text-black text-[40px]">
        SeAn  
      </h1>
    </div>
    <p class="font-rubik font-[300] text-[20px] text-black">
      SeAn@gmail.com
    </p>
    <p class="font-rubik font-[300] text-[20px] text-black">
      +62539373646348
    </p>
    <p class="font-rubik font-[300] text-[20px] text-black">
      SeAn Company
    </p>
  </div>

  <div class="flex flex-col gap-y-5 justify-center items-stretch">
    <h1 class="font-rubik font-[600] text-black text-[24px]">
      Brows By City
    </h1>
    <p class="font-rubik font-[300] text-[20px] text-black">
      Surabaya
    </p>
    <p class="font-rubik font-[300] text-[20px] text-black">
      Yogyakarta
    </p>
    <p class="font-rubik font-[300] text-[20px] text-black">
      Jakarta
    </p>
    <p class="font-rubik font-[300] text-[20px] text-black">
      Madura
    </p>
    <p class="font-rubik font-[300] text-[20px] text-black">
      Solo
    </p>
  </div>

  <div class="flex flex-col gap-y-5 justify-center items-stretch">
    <h1 class="font-rubik font-[600] text-black text-[24px]">
      Company 
    </h1>
    <p class="font-rubik font-[300] text-[20px] text-black">
      About Us
    </p>
    <p class="font-rubik font-[300] text-[20px] text-black">
      Services
    </p>
    <p class="font-rubik font-[300] text-[20px] text-black">
      Contact Us
    </p>
  </div>
</footer>

@endsection