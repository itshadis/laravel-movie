<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

    public static function middleware() {
        // return [
        //     "isAuth",
        //     new Middleware("isMember", only: ["show"])
        // ];
    }

    public function index() {
        // return response()->json([
        //     "status" => true,
        //     "message" => "success",
        //     "data" => $this->movies
        // ], 200);

        $movie = [ "movies" => $this->movies ];

        return view("movies.index", $movie);
    }

    public function show($id) {
        $movie = [ "movie" => $this->movies ];

        return view("movies.show", $movie);
    }

    public function store() {
        $this->movies[] = [
            "title" => request("title"),
            "year" => request("year"),
            "genre" => request("genre")
        ];

        return $this->movies;
    }

    public function update($id) {
        $this->movies[$id]["title"] = request("title");
        $this->movies[$id]["year"] = request("year");
        $this->movies[$id]["genre"] = request("genre");

        return $this->movies;
    }

    public function destroy($id) {
        unset($this->movies[$id]);

        return $this->movies;
    }
}
