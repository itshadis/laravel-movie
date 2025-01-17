<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class MovieController extends Controller implements HasMiddleware
{
    private $movies;

    public function __construct() 
    {
        $this->movies = [
            [
                "title" => "Oppenheimer",
                "desc" => "A historical drama following the life of J. Robert Oppenheimer, the physisct who helper...",
                "release_date" => "2023-07-21",
                "cast" => ["Cillian Murphy", "Emily Blunt", "Matt Damon", "Robert Downey Jr", "Florench Pugh"],
                "genres" => ["Drama", "History", "Thriller"],
                "image" => "https://media.themoviedb.org/t/p/w600_and_h900_bestv2/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg"
            ],
            [
                "title" => "Oppenheimer",
                "desc" => "A historical drama following the life of J. Robert Oppenheimer, the physisct who helper...",
                "release_date" => "2023-07-21",
                "cast" => ["Cillian Murphy", "Emily Blunt", "Matt Damon", "Robert Downey Jr", "Florench Pugh"],
                "genres" => ["Drama", "History", "Thriller"],
                "image" => "https://media.themoviedb.org/t/p/w600_and_h900_bestv2/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg"
            ],
            [
                "title" => "Oppenheimer",
                "desc" => "A historical drama following the life of J. Robert Oppenheimer, the physisct who helper...",
                "release_date" => "2023-07-21",
                "cast" => ["Cillian Murphy", "Emily Blunt", "Matt Damon", "Robert Downey Jr", "Florench Pugh"],
                "genres" => ["Drama", "History", "Thriller"],
                "image" => "https://media.themoviedb.org/t/p/w600_and_h900_bestv2/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg"
            ],
            [
                "title" => "Oppenheimer",
                "desc" => "A historical drama following the life of J. Robert Oppenheimer, the physisct who helper...",
                "release_date" => "2023-07-21",
                "cast" => ["Cillian Murphy", "Emily Blunt", "Matt Damon", "Robert Downey Jr", "Florench Pugh"],
                "genres" => ["Drama", "History", "Thriller"],
                "image" => "https://media.themoviedb.org/t/p/w600_and_h900_bestv2/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg"
            ],
            [
                "title" => "Oppenheimer",
                "desc" => "A historical drama following the life of J. Robert Oppenheimer, the physisct who helper...",
                "release_date" => "2023-07-21",
                "cast" => ["Cillian Murphy", "Emily Blunt", "Matt Damon", "Robert Downey Jr", "Florench Pugh"],
                "genres" => ["Drama", "History", "Thriller"],
                "image" => "https://media.themoviedb.org/t/p/w600_and_h900_bestv2/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg"
            ],
            [
                "title" => "Oppenheimer",
                "desc" => "A historical drama following the life of J. Robert Oppenheimer, the physisct who helper...",
                "release_date" => "2023-07-21",
                "cast" => ["Cillian Murphy", "Emily Blunt", "Matt Damon", "Robert Downey Jr", "Florench Pugh"],
                "genres" => ["Drama", "History", "Thriller"],
                "image" => "https://media.themoviedb.org/t/p/w600_and_h900_bestv2/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg"
            ]
        ];
    }

    public static function middleware() 
    {
        // return [
        //     "isAuth",
        //     new Middleware("isMember", only: ["show"])
        // ];
    }

    public function index() 
    {
        // return response()->json([
        //     "status" => true,
        //     "message" => "success",
        //     "data" => $this->movies
        // ], 200);

        $movie = [ "movies" => $this->movies ];

        return view("movies.index", $movie);
    }

    public function create() 
    {
        return view("movies.create");
    }
    
    public function show($id) 
    {
        $movie = [ "movie" => $this->movies[$id], "movieId" => $id ];
        return view("movies.show", $movie);
    }


    public function store(Request $request) 
    {
        $newMovie = [
            "title" => $request["title"],
            "desc" => $request["desc"],
            "release_date" => $request["release_date"],
            "cast" => explode(",", $request["cast"]),
            "genres" => explode(",", $request["genres"]),
            "image" => $request["image"],
        ];

        $this->movies[] = $newMovie;

        return $this->index();
    }

    public function edit($id) 
    {
        $movie = $this->movies[$id];
        $movie["casts"] = implode(",", $movie["cast"]);
        $movie["genres"] = implode(",", $movie["genres"]);

        return view("movies.edit", ["movie" => $movie, "movieId" => $id]);
    }

    public function update(Request $request, $id) 
    {
        $this->movies[$id]["title"] = $request["title"];
        $this->movies[$id]["release_date"] = $request["release_date"];
        $this->movies[$id]["desc"] = $request["desc"];
        $this->movies[$id]["casts"] = explode(",", $request["casts"]);
        $this->movies[$id]["genres"] = explode(",", $request["genres"]);
        $this->movies[$id]["image"] = $request["image"];

        return $this->show($id);
    }

    public function destroy($id) 
    {
        unset($this->movies[$id]);

        return $this->index();
    }
}
