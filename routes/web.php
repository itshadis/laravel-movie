<?php

use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
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

Route::get("/request", function(Request $request) {
    return $request->name;
});

Route::get("/cache", function() {
    return response("ok", 200)
            ->header("Content-Type", "text/plain")
            ->header("Cache-Control", "public, max-age=3600");
});

Route::get("cookie", function() {
    $user = "admin";

    return response("ok", 200)->cookie("user", $user);
});

Route::get("logout", function() {
    return response("logout berhasil", 200)->withoutCookie("user");
});

Route::get("/home", function() {
    return view("home");
});