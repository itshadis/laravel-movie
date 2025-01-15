@extends('app')

@section('content')
  <div class="grid justify-items-center grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-6 gap-4 mt-2 px-20">
    @foreach ($movies as $movie)
    <div class="bg-gray-800 p-4 rounded-lg relative group">
        <a href="{{ route("movie.show", $loop->index) }}">
        <img src="{{ $movie["image"] }}" alt="{{ $movie["title"] }}" class="w-full rounded-md">
        <h3 class="text-lg mt-2">{{ $movie["title"] }}</h3>
        <p class="text-sm text-gray-400">{{ $movie["release_date"] }}</p>
        
        <div class="absolute top-2 right-2 space-x-2 opacity-0 group-hover:opacity-100 transition">
          <a href="{{ route("movie.edit", $loop->index) }}" class="bg-green-600 p-1 rounded hover:bg-green-500">✏️</a>
          <form method="POST" id="delete-form-{{ $loop->index }}" action="{{ route("movie.destroy", $loop->index) }}" class="hidden">
            @csrf
            @method("DELETE")
          </form>
          <a 
            href="{{ route("movie.destroy", $loop->index) }}" 
            class=" bg-red-600 p-1 rounded hover:bg-red-500"
            onclick="event.preventDefault(); confirm('Are You Sure?'); document.getElementById('delete-form-{{ $loop->index }}').submit();"
          >🗑️</a>
        </div>
      </div>
      @endforeach
    </a>
  </div>
@endsection