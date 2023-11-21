@extends('layouts.mainLayout')
@section('content')

<h1>judul: {{ $academy->title }}</h1>
<h2>Deskripsi: {{ $academy->description }}</h2>
<h2>Harga: ${{ $academy->price }}</h2>
@endsection