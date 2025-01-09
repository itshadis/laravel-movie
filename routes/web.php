<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(
    [
        "prefix" => "movie",
        "as" => "movie."
    ],
    function() {
        Route::get("/", [MovieController::class, "index"]);
        Route::get("/{id}", [MovieController::class, "show"]);
        Route::post("/", [MovieController::class, "store"]);
        Route::put("/{id}", [MovieController::class, "update"]);
        Route::delete("/{id}", [MovieController::class, "destroy"]);
    }
);

Route::get("/login", function() {
    return "You need to login";
})->name("login");

Route::get("/pricing", function() {
    return "Please, buy a membership!";
});
