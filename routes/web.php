<?php


use App\Http\Controllers\CodesController;
use App\Http\Middleware\SanitazeInput;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get("/", )


Route::get("/", HomeController::class);

Route::group(["middleware" => "auth", "prefix" => "codes"], function () {
    Route::get("/", [CodesController::class, "list"])->name("your_codes");
    Route::post("/", [CodesController::class, "create"])->name("add_codes");
    Route::delete("/", [CodesController::class, "delete"])->name("delete_codes")->middleware(SanitazeInput::class);
    Route::get("/create", [CodesController::class, "renderCreateForm"])->name("render_create_form");
    Route::get("/delete", [CodesController::class, "renderDeleteForm"])->name("render_delete_form");
});


