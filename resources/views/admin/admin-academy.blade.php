@include('admin.admin-dashboard');

<div class="pt-24">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <button class="font-medium btn bg-purple-400 h-10 px-6 hover:bg-black text-white rounded">
                    <a href="/create-academy">Add New Product</a>
                </button>

                <table class="table-auto w-full my-10">
                    <thead>
                        <tr class="text-center">
                            <th class="py-2">No</th>
                            <th class="w-1/5">Images</th>
                            <th class="w-1/5">Title</th>
                            <th class="w-1/5">Price</th>
                            <th class="w-1/5">Duration</th>
                            <th class="w-1/5">Member</th>
                            <th class="w-24">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($academies as $academy)
                        <tr>
                            <td class="text-center">{{ $academy->id }}</td>
                            <td class="text-center"><img class="mx-auto" src="/image/{{ $academy->image }}" width="100px"></td>
                            <td>{{ $academy->title }}</td>
                            <td class="text-center">{{ $academy->price }}</td>
                            <td class="text-center">{{ $academy->duration }}</td>
                            <td class="text-center">{{ $academy->memberCount }}</td>
                            <td class="text-center">
                                <form action="#" method="POST">
                                    {{-- <button class="btn bg-blue-900 h-10 hover:bg-black text-white rounded w-24">
                                        <a href="#">Show</a>
                                    </button> --}}
                                    <button class="btn bg-blue-900 h-10 hover:bg-black text-white rounded w-20">
                                        <a href="/edit-academy/{{ $academy->id }}">Edit</a>
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger bg-red-900 h-10 hover:bg-black text-white rounded w-26">Delete</button>
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
