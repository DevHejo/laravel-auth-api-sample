<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// controllers
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->prefix('v1')->group(function() {
    Route::get('/user', function(Request $request) {
        return $request->user();
    });
    // Route::get('/authors/{author}', [AuthorsController::class, 'show']);
    Route::apiResource('/authors', AuthorsController::class);
    // Route::post('/books/create', [BooksController::class, 'create']);
    Route::apiResource('/books', BooksController::class);
});


Route::get('/test', function(Request $request){
    $test = 'Test Route';
    return response()->json($test);
});