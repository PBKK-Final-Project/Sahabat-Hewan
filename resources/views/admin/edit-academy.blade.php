@include('admin.admin-dashboard');

<form action="/edit-academy/{{$academy->id}}" method="POST" class="w-[90%] mt-24 flex flex-col gap-y-5 mx-auto px-5 py-5" enctype="multipart/form-data">
  @csrf
  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="title" class="block text-medium font-medium text-gray-700">Academy title</label>
      <input value="{{ $academy->title }}" type="text" name="title" id="title" class="text-gray-900 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm font-medium border-gray-300 rounded-md">
    </div>
    <div class="w-[50%]">
      <label for="instructor" class="block text-medium font-medium text-gray-700">Instructor</label>
      <input value="{{ $academy->instructor }}" type="text" name="instructor" id="instructor" class="text-gray-900 text-medium font-medium mt-1 focus:ring-indigo-500 focus:border-indigo-500 py-2 block w-full shadow-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="level" class="block text-medium font-medium text-gray-700">Level</label>
      <input value="{{ $academy->level }}" type="hidden" name="level" id="level" class="font-medium text-gray-900">
      <select name="new_level" id="new_level" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 font-medium text-medium text-gray-900">
        <option value="beginner" {{ $academy->level === 'Beginner' ? 'selected' : '' }}>Beginner</option>
        <option value="intermediate" {{ $academy->level === 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
        <option value="professional" {{ $academy->level === 'Professional' ? 'selected' : '' }}>Professional</option>
      </select>
    </div>
    
    <div class="w-[50%]">
      <label for="category" class="block text-medium font-medium text-gray-700">Category</label>
      <input value="{{ $academy->category }}" type="hidden" name="category" id="category" class="font-medium text-gray-900">
      <select name="new_category" id="new_category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 font-medium text-medium text-gray-900">
        <option value="training" {{ $academy->category === 'training' ? 'selected' : '' }}>Training</option>
        <option value="academy" {{ $academy->category === 'academy' ? 'selected' : '' }}>Academy</option>
      </select>
    </div>
  </div>

  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="certificate" class="block text-medium font-medium text-gray-700">Certificate</label>
      <input value="{{ $academy->certificate }}" type="hidden" name="certificate" id="certificate" class="font-medium text-gray-900">
      <select name="new_certificate" id="new_certificate" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 font-medium text-medium text-gray-900">
        <option value="yes" {{ $academy->certificate === 'yes' ? 'selected' : '' }}>Yes</option>
        <option value="no" {{ $academy->certificate === 'no' ? 'selected' : '' }}>No</option>
      </select>
    </div>

    <div class="w-[50%]">
      <label for="consult" class="block text-medium font-medium text-gray-700">Consult</label>
      <input value="{{ $academy->consult }}" type="hidden" name="consult" id="consult" class="font-medium text-gray-900">
      <select name="new_consult" id="new_consult" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 font-medium text-medium text-gray-900">
        <option value="yes" {{ $academy->consult === 'yes' ? 'selected' : '' }}>Yes</option>
        <option value="no" {{ $academy->consult === 'no' ? 'selected' : '' }}>No</option>
      </select>
    </div>
  </div>

  {{-- textarea for description --}}
  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="description" class="block text-medium font-medium text-gray-700">Description</label>
      <div class="mt-1">
        <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full font-medium text-gray-900 border-gray-300 rounded-md">{{ $academy->description }}</textarea>
      </div>
    </div>
    

    <div class="w-[50%]">
      <label for="additional_materials" class="block text-medium font-medium text-gray-700">Additional Materials</label>
      <div class="mt-1">
        <textarea id="additional_materials" name="additional_materials" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full font-medium text-gray-900 border-gray-300 rounded-md">{{ $academy->additional_materials }}</textarea>
      </div>
    </div>
  </div>

  <div class="w-full flex flex-row gap-x-5 justify-center items-center">
    <div class="w-[50%]">
      <label for="price" class="block text-medium font-medium text-gray-700">Price</label>
      <input value="{{ $academy->price }}" type="number" name="price" id="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm font-medium text-gray-900 border-gray-300 rounded-md">
    </div>
    <div class="w-[50%]">
      <label for="duration" class="block text-medium font-medium text-gray-700">Duration</label>
      <input value="{{ $academy->duration }}" type="text" name="duration" id="duration" class="text-gray-900 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm font-medium border-gray-300 rounded-md">
    </div>
  </div>

  {{-- upload image --}}
  <div class="w-full flex flex-row gap-x-5 justify-start items-center">
    <div class="w-[50%]">
      <label for="image" class="block text-medium font-medium text-gray-700">Image</label>
      <input type="file" name="image" id="image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm font-medium border-gray-300 rounded-md">
    </div>
    <div class="w-[50%]">
      <label for="video" class="block text-medium font-medium text-gray-700">Video</label>
      <input type="text" name="youtubeLink" id="youtubeLink" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm font-medium border-gray-300 rounded-md">
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

