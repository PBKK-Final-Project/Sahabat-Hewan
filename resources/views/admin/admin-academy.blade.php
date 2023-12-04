@include('admin.admin-dashboard');

<div class="pt-28">
    <div class="mx-auto sm:px-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="pt-6 text-gray-900 dark:text-gray-100">
                <button class="font-medium btn bg-purple-400 h-10 px-6 hover:bg-black text-white rounded">
                    <a href="/create-academy">Add New Product</a>
                </button>

                <table class="table-auto my-4 border border-collapse">
                    <thead>
                        <tr class="text-center">
                            <th class="py-6 px-4 w-auto border">No</th>
                            <th class="px-[130px] border">Images</th>
                            <th class="px-[300px] border">Title</th>
                            <th class="px-4 border">Price</th>
                            <th class="px-4 border">Duration</th>
                            <th class="px-4 border">Member</th>
                            <th class="px-8 border">Level</th>
                            <th class="px-[150px] border">Youtube Link</th>
                            <th class="px-[100px] border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($academies as $academy)
                        <tr class="border">
                            <td class="py-6 text-center border">{{ $academy->id }}</td>
                            <td class="text-center justify-center border">
                                <img class="mx-auto" src="/images/{{ $academy->image }}" width="100px" height="80px">
                            </td>                            
                            <td class="border">{{ $academy->title }}</td>
                            <td class="text-center border">{{ $academy->price }}</td>
                            <td class="text-center border">{{ $academy->duration }}</td>
                            <td class="text-center border">{{ $academy->memberCount }}</td>
                            <td class="text-center border">{{ $academy->level }}</td>
                            <td class="text-center border">{{ $academy->youtubeLink }}</td>
                            <td class="py-6 text-center justify-center border">
                                <form action="#" method="POST">
                                    <button class="bg-blue-900 py-2 mx-2 w-auto px-4 hover:bg-black text-white rounded">
                                        <a href="/edit-academy/{{ $academy->id }}">Edit</a>
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mx-2 bg-red-900 py-2 px-4 w-auto hover:bg-black text-white rounded">Delete</button>
                                </form>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- {!! $products->links() !!} --}}
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
