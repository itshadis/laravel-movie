<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::group(
    [
        "prefix" => "movie",
        "as" => "movie."
    ],
    function() {
        Route::get("/", [MovieController::class, "index"])->name("index");
        Route::post("/", [MovieController::class, "store"])->name("store");
        Route::get("/create", [MovieController::class, "create"])->name("create");
        Route::get("/{id}", [MovieController::class, "show"])->name("show");
        Route::get("/{id}/edit", [MovieController::class, "edit"])->name("edit");
        Route::put("/{id}", [MovieController::class, "update"])->name("update");
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

Route::get("/", function() {
    return view("home");
});