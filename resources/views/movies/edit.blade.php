@extends('app')

@section('content')
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold mb-6">Edit Movie</h2>

    <form action="{{ route("movie.update", $movieId) }}" method="POST" class="space-y-6">
      @csrf
      @method("PUT")

      <div>
        <label for="title">Title</label>
        <input 
          type="text"
          name="title"
          id="title"
          class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
          value="{{ $movie["title"] }}" 
        >
      </div>

      <div>
        <label for="desc" class="block text-lg mb-2">Description</label>
        <textarea 
          name="desc" 
          id="desc" 
          cols="30"
          rows="10"
          class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"
        >
          {{ $movie["desc"] }}
        </textarea>
      </div>
      
      <div>
        <label for="release_date" class="block text-lg mb-2">Release Date</label>
        <input 
          type="date" 
          name="release_date" 
          id="release_date"
          class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"
          value="{{ $movie["release_date"] }}"
        ></input>
      </div>
      
      <div>
        <label for="cast" class="block text-lg mb-2">Casts</label>
        <input 
          type="input" 
          name="cast" 
          id="cast"
          class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"  
          value="{{ $movie["casts"] }}"
        ></input>
      </div>
      
      <div>
        <label for="genres" class="block text-lg mb-2">Genres</label>
        <input 
          type="input" 
          name="genres" 
          id="genres"
          class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" 
          value="{{ $movie["genres"] }}" 
        ></input>
      </div>

      <div>
        <label for="image" class="block text-lg mb-2">Poster Image</label>
        <input 
          type="input" 
          name="image" 
          id="image"
          class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"  
          value="{{ $movie["image"] }}" 
        ></input>
      </div>

      <div>
        <button 
          type="submit"
          class="bg-blue-600 px-6 py-2 rounded hover:bg-blue-500"  
        >Save</button>
      </div>
    </form>
  </div>
@endsection