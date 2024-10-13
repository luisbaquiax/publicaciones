<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ControllerPublicacion;
use \App\Http\Controllers\ControllerUsuario;

Route::get('/singup', function () {
    return view('users/createUser');
});

Route::get('/login', function () {
    return view('login');
});

Route::get("/",[ControllerPublicacion::class, "list"])->name("publicacion.list");
Route::get("/publicacion/{filtro}/filter",[ControllerPublicacion::class, "filterPublicaciones"])
    ->name("publicacion.filter");
Route::get("/users/{username}/mispublicaciones",[ControllerPublicacion::class, "listByUsername"])
    ->name("users.mispublicaciones");
Route::post("/loginUser",[ControllerUsuario::class, "search"])->name("users.search");
Route::get("/singout",[ControllerUsuario::class, "signOut"])->name("users.singout");
