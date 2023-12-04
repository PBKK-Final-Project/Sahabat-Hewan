@include('admin.admin-dashboard');

<form action="/create-academy" method="POST" class="w-[90%] mt-24 flex flex-col gap-y-5 mx-auto px-5 py-5" enctype="multipart/form-data">
  @csrf
  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="title" class="block text-[1.5rem] font-medium text-gray-700">Academy title</label>
      <input  type="text" name="title" id="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-[1.5rem] border-gray-300 rounded-md">
    </div>
    <div class="w-[50%]">
      <label for="instructor" class="block text-[1.5rem] font-medium text-gray-700">Instructor</label>
      <input  type="text" name="instructor" id="instructor" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 py-2 block w-full shadow-sm sm:text-[1.5rem] border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="level" class="block text-[1.5rem] font-medium text-gray-700">Level</label>
      <select id="level" name="level" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-[1.5rem]">
        <option></option>
        {{-- @foreach ($categories as $level) --}}
        <option value="beginner">beginner</option>
        <option value="intermediate">intermediate</option>
        <option value="profesional">profesional</option>
        {{-- @endforeach --}}
      </select>
    </div>

    <div class="w-[50%]">
      <label for="category" class="block text-[1.5rem] font-medium text-gray-700">Category</label>
      <select id="category" name="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-[1.5rem]">
        <option></option>
        {{-- @foreach ($types as $type) --}}
          <option value="training">training</option>  
          <option value="academy">academy</option>  
        {{-- @endforeach --}}
      </select>
    </div>
  </div>

  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="certificate" class="block text-[1.5rem] font-medium text-gray-700">Certificate</label>
      <select id="certificate" name="certificate" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-[1.5rem]">
        <option></option>
        {{-- @foreach ($categories as $level) --}}
        <option value="yes">yes</option>
        <option value="no">no</option>
        {{-- @endforeach --}}
      </select>
    </div>

    <div class="w-[50%]">
      <label for="consult" class="block text-[1.5rem] font-medium text-gray-700">Consult</label>
      <select id="consult" name="consult" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-[1.5rem]">
        <option></option>
        {{-- @foreach ($types as $type) --}}
          <option value="yes">yes</option>  
          <option value="no">no</option>  
        {{-- @endforeach --}}
      </select>
    </div>
  </div>

  {{-- textarea for description --}}
  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="description" class="block text-[1.5rem] font-medium text-gray-700">Description</label>
      <div class="mt-1">
        <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-[1.5rem] border-gray-300 rounded-md"></textarea>
      </div>
    </div>

    <div class="w-[50%]">
      <label for="additional_materials" class="block text-[1.5rem] font-medium text-gray-700">Additional Materials</label>
      <div class="mt-1">
        <textarea  id="additional_materials" name="additional_materials" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-[1.5rem] border-gray-300 rounded-md"></textarea>
      </div>
    </div>
  </div>

  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="price" class="block text-[1.5rem] font-medium text-gray-700">Price</label>
      <input type="number" name="price" id="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-[1.5rem] border-gray-300 rounded-md">
    </div>
    <div class="w-[50%]">
      <label for="duration" class="block text-[1.5rem] font-medium text-gray-700">Duration</label>
      <input type="text" name="duration" id="duration" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-[1.5rem] border-gray-300 rounded-md">
    </div>
  </div>

  {{-- upload image --}}
  <div class="w-full flex flex-row gap-x-5 justify-start items-center">
    <div class="w-[50%]">
      <label for="image" class="block text-[1.5rem] font-medium text-gray-700">Image</label>
      <input type="file" name="image" id="image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-[1.5rem] border-gray-300 rounded-md">
    </div>
    <div class="w-[50%]">
      <label for="video" class="block text-[1.5rem] font-medium text-gray-700">Video</label>
      <input type="text" name="youtubeLink" id="youtubeLink" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-[1.5rem] border-gray-300 rounded-md">
    </div>
  </div>

  {{-- submit button --}}
  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-full">
      <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-[1.5rem] font-medium rounded-md text-white bg-[#3B82F6] hover:bg-[#3B82F6] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Submit
      </button>
    </div>
  </div>
</form>

