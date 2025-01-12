@extends('app')

@section('content')
  <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-4 mt-2">
    @foreach ($movies as $movie)
      <div class="bg-gray-800 p-4 rounded-lg relative group">
        <img src="{{ $movie["image"] }}" alt="{{ $movie["title"] }}" class="w-full rounded-md">
        <h3 class="text-lg mt-2">{{ $movie["title"] }}</h3>
        <p class="text-sm text-gray-400">{{ $movie["release_date"] }}</p>
        
        <div class="absolute top-2 right-2 space-x-2 opacity-0 group-hover:opacity-100 transition">
          <button class="bg-green-600 p-1 rounded hover:bg-green-500">✏️</button>
          <button class=" bg-red-600 p-1 rounded hover:bg-red-500">🗑️</button>
        </div>
      </div>
    @endforeach
  </div>
@endsection