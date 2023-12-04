@extends('layouts.mainLayout')
@section('content')
@include('navbar.navbar')

<div class="relative pt-24 text-center">
    <div class="absolute inset-0">
        <img class="w-full h-[220px] object-cover" src="/storage/academy/images/{{ $academy->image }}" alt="Background Image">
        <div class="w-full h-[220px] absolute inset-0 bg-black opacity-30"></div>
    </div>

    <div class="relative z-10 mx-auto max-w-screen-lg"> <!-- Added mx-auto and max-w-screen-lg for centering and limiting width -->
        <h1 class="mb-2 text-8xl font-baloo font-[700] text-[3rem] text-white uppercase" style="letter-spacing: 1px;">
            ACADEMY
        </h1>
        <p class="mb-5 text-base text-white sm:text-lg dark:text-gray-400">
            {{ $academy->title }}
        </p>
    </div>
    <div class="h-[108px] flex items-center justify-center mb-4">
        <div class="mr-2">
            <img src="/images/release.svg" alt="Global Icon" class="w-6 h-6">
        </div>
        <div class="mr-6">
            <span class="text-black">Release date {{ $academy->created_at }}</span>
        </div>
        <div class="ml-6 mr-2">
            <img src="/images/updated.svg" alt="Convert Icon" class="w-6 h-6">
        </div>
        <div>
            <span class="text-black">Last updated {{ $academy->updated_at }}</span>
        </div>
    </div>
</div>

<!-- New content about members, levels, certificates, and consultations -->
<div class="mt-[-24px] grid grid-cols-5 items-center mx-auto max-w-screen-lg"> <!-- Added mx-auto and max-w-screen-lg for centering and limiting width -->
    <!-- Member information -->
    <div class="text-center">
        <h2 class="text-black mb-2">Members</h2>
        <p class="text-black"><strong>{{ $academy->memberCount }}</strong> enrolled</p>
    </div>

    <!-- Level information -->
    <div class="text-center">
        <h2 class="text-black mb-2">Difficulty</h2>
        @if($academy->level == 'beginner')
            <img src="/images/beginner.svg" alt="Certificate Beginner" class="mx-auto">
        @elseif($academy->level == 'intermediate')
            <img src="/images/intermediate.svg" alt="Certificate Intermediate" class="mx-auto">
        @else
        <img src="/images/advanced.svg" alt="Certificate Advanced" class="mx-auto">
        @endif       
    </div>

    <!-- Certificate information -->
    <div class="text-center justify-center items-center"> <!-- Added flex, justify-center, and items-center classes -->
        <h2 class="text-black mb-2">Certificates</h2>
        @if($academy->certificate == 'yes')
            <img src="/images/yes.svg" alt="Certificate Yes" class="mx-auto">
        @else
            <img src="/images/no.svg" alt="Certificate No" class="mx-auto">
        @endif    
    </div>

    <!-- Consultation information -->
    <div class="text-center">
        <h2 class="text-black mb-2">Consultations</h2>
        @if($academy->consult == 'yes')
            <img src="/images/yes.svg" alt="Consult Yes" class="mx-auto">
        @else
            <img src="/images/no.svg" alt="Consult No" class="mx-auto">
        @endif
    </div>

    <!-- Duration information -->
    <div class="text-center">
        <h2 class="text-black mb-2">Duration</h2>
        <p class="text-black"><strong>{{ $academy->duration }}</strong></p>
    </div>
</div>

<div class="px-20 mt-10 grid grid-cols-1 lg:grid-cols-8 gap-6">
    <!-- youtube (4/8 width) -->
    <section id="about" class="lg:col-span-5 rounded overflow-hidden">
        @php
            $videoId = substr($academy->youtubeLink, strpos($academy->youtubeLink, '=') + 1);
        @endphp
        <iframe class="w-full h-96" src="https://www.youtube.com/embed/{{ $videoId }}" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
    </section>
    
    

    <!-- Description (4/8 width) -->
    <div class="lg:col-span-3">
        <div class="flex justify-center items-center space-x-2">
            <a href="#about" class="inline-block px-4 py-2 bg-gray-800 text-white rounded-full text-center hover:bg-blue-900 transition duration-300">About</a>
            <a href="#lessons" class="inline-block px-4 py-2 bg-gray-800 text-white rounded-full text-center hover:bg-blue-900 transition duration-300">Lessons</a>
            <a href="#tools" class="inline-block px-4 py-2 bg-gray-800 text-white rounded-full text-center hover:bg-blue-900 transition duration-300">Tools</a>
            <a href="#reviews" class="inline-block px-4 py-2 bg-gray-800 text-white rounded-full text-center hover:bg-blue-900 transition duration-300">Reviews</a>
            <a href="#skills" class="inline-block px-4 py-2 bg-gray-800 text-white rounded-full text-center hover:bg-blue-900 transition duration-300">Develop Your Skills</a>
        </div>

        <div class="mb-[2rem] pt-8">
            <p class="p-4 text-gray-600 dark:text-white bg-gray-100 text-center rounded-t-lg">32 bagian • 352 pelajaran • 28j 14m total durasi</p>
            <div class="relative bg-gray-100 rounded-b-lg">
                <div class="px-4 pb-4 space-y-4">
                    <div class="bg-white flex p-4 rounded">
                        <img src="/images/play.svg" alt="Consult Yes">
                        <div class="flex-grow ml-4 mr-4 flex justify-between items-center">
                            <div>
                                <h2>Section 1: Introduction</h2>
                            </div>
                            <div>
                                <h2>9 min</h2>
                            </div>
                        </div>
                    </div>
        
                    <div class="bg-white flex p-4 rounded">
                        <img src="/images/play.svg" alt="Consult Yes">
                        <div class="flex-grow ml-4 mr-4 flex justify-between items-center">
                            <div>
                                <h2>Section 2: Make a High Five 👋🏻</h2>
                            </div>
                            <div>
                                <h2>9 min</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-4 lg:col-span-4 flex justify-center items-center space-x-2">
                <a href="#enrollMe" class="inline-block px-4 py-2 bg-gray-800 text-white rounded-full text-center hover:bg-blue-900 transition duration-300">Enroll Me</a>
            </div>
        </div>
        
    </div>
</div>

<div class="px-20 mt-10 grid grid-cols-1 lg:grid-cols-8 gap-6">
    <div class="lg:col-span-4 bg-white">
        <h2 class="text-xl font-bold mb-2">Description</h2>
        <p>{!! $academy->description !!}</p>
    </div>
    {{-- <div class="lg:col-span-4 flex justify-center items-center space-x-2">
        <a href="#enrollMe" class="inline-block px-4 py-2 bg-gray-800 text-white rounded-full text-center hover:bg-blue-900 transition duration-300">Enroll Me</a>
    </div> --}}
</div>

@include('footer.footer')
@endsection
