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
        for($i=0; $i<10; $i++) {
            $this->movies[] = [
                "title" => "Movie {$i}",
                "year" => "2015",
                "genre" => "Action"
            ];
        }
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

        $movie = [ "movie" => $this->movies ];

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
