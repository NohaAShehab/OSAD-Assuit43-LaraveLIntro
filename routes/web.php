<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
# route  ---> method ---> get
Route::get('/iti', function (){
    return 'Hello world';
});


Route::get("/students", function (){
    $students = ['Ahmed', 'Gehad', 'Mario', 'Samer', 'Norhan', "Mohamed"];
    return $students;

});

Route::get("/students/{index}", function ($index){

    $students = ['Ahmed', 'Gehad', 'Mario', 'Samer', 'Norhan', "Mohamed"];
    if (isset($students[$index]) and ! empty($students[$index]) ){
        return $students[$index];
    }
    return abort(404);
});



## fullstack ---> route return view
###
Route::get('/home', function () {
    $courses = ['php', 'laravel'];

    return view('homepage');
});


Route::view("/homepage", 'homepage');

#### modification ---> route ---> associated with controller --->

use App\Http\Controllers\ITIController;
Route::get('/testcontroller', [ITIController::class, 'testcontroller']);

use App\Http\Controllers\HomepageController;

Route::get("/homepage/controller", [HomepageController::class, 'homepage']);
Route::get("/courses", [HomepageController::class, 'getCourses']);

####################


use App\Http\Controllers\ProductController;
Route::get("/products/index", [ProductController::class, 'products_index']);
Route::get("/products/create", [ProductController::class, 'create'])->name('products.create');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::post("/products", [ProductController::class, 'save']);
Route::get('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
























