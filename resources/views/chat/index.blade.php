@extends('layouts.mainLayout')
@section('content')

<script type="module">
  let userId = null;

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(document).ready(function () { 

  $.ajax({
    url: '/dokter',
    method: 'GET',
    success: function (data) {
      var receivers = data.data;
      console.log("receiver sender data: ", receivers);
      var sender = data.me;

      receivers.forEach(function(receiver) {
        window.Echo.private(`private-notification.${receiver.id}`)
          .listen('.MessageNotification', (e) => {
            console.log('pengirim: ', sender, e.message);
            
            var dokter_id = parseInt(e.message);  
            $.ajax({
              url: `/dokter/${dokter_id}`,
              method: 'GET',
              success: function(data)
              {
                var dokterData = data.data;
                console.log("Dokter Data from ajax: ", dokterData);

                $("#message-recent-inbox").text(e.pesan);
                $("#sender-recent-inbox").text(dokterData.name);

                // add image to user-profile
                var userProfile = document.getElementById('user-profile');
                var imageSource = '/storage/product/images/' + dokterData.avatar;
                userProfile.innerHTML = `
                  <img src="${imageSource}" class="object-contain bg-no-repeat" alt="">
                `;

                var inputName = "dokter_id-" + dokter_id; 
                console.log("input name: ", inputName);
                var dokterId = $(this).find(`input[name="${inputName}"]`).val();
      
                $("#chat-header").text(`${dokterData.name}`);
      
                var url = 'http://localhost:8000/mychat/' + dokter_id;
                $("input[name='id-dokter']").val(dokter_id);


                $("#btn-recent-inbox").click(function() {  
                  $("#chat-container").removeClass('hidden');
                  console.log("clicked");
                  fetchAndDisplayChatData(url, dokter_id);  

                })
                
                fetchAndDisplayChatData(url, dokter_id);

              }
            })
  
        });

      })
    },
  })
  });

  function sendChat(url, chatDataInput)
  {
    $.ajax({
        url: url,
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          'Accept': 'application/json',
        },
        data: {
          message: chatDataInput
        },
        success: function(data) {
          console.log("success");
        },
        error: function(xhr, status, error) {
          console.log(xhr)
          console.error(error);
        }
      });
  }

  function fetchDokter()
  {
    $.ajax({
      url: 'http://localhost:8000/dokter',
      method: 'GET',
      success: function(data) {
        var dokterDatas = data.data;

        dokterDatas.forEach(function(dokterData) {
          var dokterChatContainer = document.getElementById('dokter-chat');
          var dokterChatElement = document.createElement('div');
          
          dokterChatElement.innerHTML = `
          <div class="flex p-2 items-center mb-4 cursor-pointer rounded-md hover:bg-gray-100" id="dokter-${dokterData.id}" >
            <input type="hidden" name="dokter_id-${dokterData.id}" value="${dokterData.id}">
            <div class="relative">
              <img src="images/me.png" alt="User" class="w-12 h-12 rounded-full border-2 border-blue-400">
              <div class="absolute h-3 w-3 bg-green-400 rounded-full -top-1.5 -left-1.5 ml-2"></div>
            </div>
            <div class="ml-3">
              <p class="font-semibold">${dokterData.name}</p>
              <p class="text-gray-500">Hello</p>
            </div>
          </div>
          `;

          dokterChatContainer.appendChild(dokterChatElement);

          $(`#dokter-${dokterData.id}`).click(function() {
            var inputName = "dokter_id-" + dokterData.id; // "dokter_id-1
            var dokterId = $(this).find(`input[name="${inputName}"]`).val();

            // change chat header
            $("#chat-header").text(dokterData.name);

            // Set dokter id ke input hidden
            $("input[name='id-dokter']").val(dokterData.id);

            var url = 'http://localhost:8000/mychat/' + dokterId;
            fetchAndDisplayChatData(url, dokterData.id);

            // Tampilkan chat container
            $("#chat-container").removeClass('hidden');
          });
        });
        console.log(dokterDatas);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }
  

  function fetchAndDisplayChatData(url, dokterId)
  {
    $.ajax({
        url: url,
        method: 'GET',
        success: function(data) {
            var chatDatas = data.data; 
            console.log("reloaddddddddd");
            console.log("chat datas", chatDatas);

            var chatContainer = document.getElementById('chat-container');
            chatContainer.innerHTML = '';
            chatDatas.forEach(function(chatData) {
                var chatElement = document.createElement('div');

                if (chatData.receiver_id == dokterId) {
                    chatElement.innerHTML = `
                    <div class="flex justify-end items-center mb-4">
                      <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 16 16" fill="#000000" class="bi bi-three-dots-vertical h-4 w-4 cursor-pointer">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                      </svg>
                      <div class="relative group text-sm p-2  shadow bg-white rounded-md max-w-xs">
                        ${chatData.message}
                        <div class="absolute top-1/2 -translate-y-1/2 right-full ml-1 hidden group-hover:block bg-gray-600 py-1 px-1.5 rounded z-0 text-white w-max">${chatData.created_at}</div>
                      </div>
                      <img src="images/me.png" alt="User" class="w-6 h-6 rounded-full border-2 border-white mr-1">
                    </div>

                    `;
                  
                } else {
                    chatElement.innerHTML = `
                    <div class="flex items-center mb-4">
                      <img src="images/me.png" alt="User" class="w-6 h-6 rounded-full border-2 border-white mr-1">
                      <div class="relative group text-sm p-2  shadow bg-white rounded-md max-w-xs">
                        ${chatData.message}
                        <div class="absolute top-1/2 -translate-y-1/2 left-full ml-1 hidden group-hover:block bg-gray-600 py-1 px-1.5 rounded z-0 text-white w-max">${chatData.created_at}</div>
                      </div>
                      <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 16 16" fill="#000000" class="bi bi-three-dots-vertical h-4 w-4 cursor-pointer">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                      </svg>
                    </div>
                    `;
                }
                chatContainer.appendChild(chatElement);
            });
            scrollToBottom();
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
  }


  function sendNotification(chatDataInput, dokterId) {
    const url = 'send-notification';
    
    if (chatDataInput == '') {
        alert('Please enter a message');
        return false;
    }

    console.log("SEND NOTIFICATION: ", dokterId);

    const headers = new Headers({
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': 'application/json',
    });

    const body = new URLSearchParams({ message: "fwefef" });

    fetch(url, {
        method: 'POST',
        headers: headers,
        body: body,
    })
    .then(response => response.json())
    .then(data => {
        console.log("weftgwerg");
    })
    .catch(error => {
        console.error(error);
    });
}

  $(document).ready(function() {
    fetchDokter();
    let user_id = null;


    userId = $("input[name='meuser']").val();

    
    $("#chat-data-input").on('input', function() {
      // Saat input berubah, periksa apakah ada teks di dalamnya
      if ($(this).val().trim() !== '') {
        $("#send-button").prop('disabled', false);
      } else {
        $("#send-button").prop('disabled', true);
      }
    });

    $.ajax({
        url: '/me',
        method: 'GET',
        success: function(data)
        {
          user_id = data.data.id;
          console.log("user id: ", user_id);
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });

 
    


    $("#chat-form").submit(function(event) {
      event.preventDefault(); 

      console.log('form submitted!'); 
      var chatDataInput = $("#chat-data-input").val();
      var dokterId = $(this).find(`input[name="id-dokter"]`).val()

      $("#chat-data-input").val('');
      var url = 'http://localhost:8000/mychat/' + dokterId;

      console.log("id dokter", dokterId); 
      console.log("input chat", chatDataInput); 

      $.ajax({
        url: '/send-notification',
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          'Accept': 'application/json',
        },
        data: {
          message: user_id,
          pesan: chatDataInput,
        },
        success: function(data) {
          console.log("success");
        },
        error: function(xhr, status, error) {
          console.log(xhr)
          console.error(error);
        }
      });

      sendChat(url, chatDataInput);

      fetchAndDisplayChatData(url, dokterId);
    });
});

function scrollToBottom()
{
  var scrollingDiv = document.getElementById("chat-container");
  scrollingDiv.scrollTop = scrollingDiv.scrollHeight;
}


</script>

<input type="hidden" name="meuser" id="" value="">


@include('navbar.navbar-login')


<div class="bg-white my-32 mt-[300px] bg-cover bg-no-repeat w-full  z-10">
  <h1 class="font-rubik font-[700] text-[100px] text-black mx-auto text-center uppercase">
    Chat & <span class="text-[#B77CD7]">Inbox</span> 
  </h1>
</div>

<div class="w-[70%] mx-auto my-20 bg-[#443E7C] flex flex-col justify-center items-start rounded-3xl px-10 py-5">
  <h1 class="font-rubik font-[500] text-white text-[70px] text-center capitalize">
    recent inbox
  </h1>
  <div class="w-full bg-white px-2 py-3 flex flex-row justify-center items-center rounded-3xl gap-x-10">
    <div class="w-[117px] h-[117px] rounded-full bg-[#D9D9D9]" id="user-profile"></div>
    <div class="flex flex-col justify-center items-start">
      <p class="font-rubik font-[500] text-black text-[50px]" id="sender-recent-inbox"></p>
      <div class="bg-[#D5DAF7] rounded-xl w-full flex justify-center items-center px-3 py-2" id="recent-inbox">
        <p class="font-rubik font-[500] text-black text-center text-[30px]" id="message-recent-inbox">
        </p>
      </div>
    </div>
    <button class="bg-[#FFB246] p-10 font-rubik font-[500] text-black text-center text-[30px] rounded-3xl" id="btn-recent-inbox">
      Open
    </button>
  </div>
</div>

<div class="w-[70%] px-5 py-10 my-20  bg-[#B9B7EA] mx-auto rounded-3xl">
  <div class=" mx-auto  px-4 mb-4">
    <div class="grid grid-cols-3 gap-4">
      <div class="col-span-1 min-w-[300px] bg-white p-4 shadow-md rounded-md ">
        <!-- chat search -->
        <input type="text" placeholder="Search" class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:border-blue-400 mb-4">
        <!-- chat list -->
        <div class="max-h-96 overflow-auto" id="dokter-chat">
          
        </div>
      </div>
      <div class="col-span-2 bg-slate-50 shadow-md rounded-m">
          
        <div>
          <!-- Chat Header -->
          <div class="flex items-center justify-between mb-4 bg-slate-200 px-4 pt-2 pb-2 rounded-tl-md rounded-tr-md">
            <div class="flex items-center">
              <img src="images/me.png" alt="User" class="w-12 h-12 rounded-full border-2 border-white">
              <div class="ml-3">
                <p class="font-semibold" id="chat-header">Dimas Fadilah</p>
                <p class="text-gray-500">Hello</p>
              </div>
            </div>
            <div class="relative inline-block text-left group ">
              {{-- <three-dots-icon class="h-6 w-6 cursor-pointer"></three-dots-icon> --}}
              <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 16 16" fill="#000000" class="bi bi-three-dots-vertical h-6 w-6 cursor-pointer">
                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
              </svg>
              <div class="origin-top-right absolute right-0 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50 hidden group-hover:block">
                <div class="py-1">
                  <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900  cursor-pointer">Close</a>
                  <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900  cursor-pointer">Clear Chat</a>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Chat body -->
          <div class="overflow-y-auto max-h-64 min-h-[19rem] px-4 hidden" id="chat-container">
  
          </div>
  
          <!-- Chat Footer -->
          <form id="chat-form" class="flex items-center p-4  bg-white rounded-bl-md rounded-br-md">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="id-dokter" value="">
              <input name="message" id="chat-data-input" type="text" placeholder="Search" class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:border-blue-400">
              <button id="send-button" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md disabled:bg-gray-400 ml-2" disabled>Send</button>
          </form>
        </div>
  
        <div class="flex flex-col items-center justify-center min-h-[19rem]">
          <img src="images/SeAn.png" alt="">
          <p class="text-2xl font-semibold mt-4">Sahabat Hewan</p>
          <p class="text-gray-500">Select a chat to start messaging</p>
        </div>
  
      </div>
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