<?php

use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



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

Route::resource('products',ProductController::class);
// Route::get('/products',[ProductController::class, 'index']);
// Route::post('/products',[ProductController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts',function(){
    return Post::all();
});

Route::post('/posts',function(){
    request()->validate([
        'title'=>'required',
        'content'=>'required',
    ]);
    return Post::create([
        'title'=>request('title'),
        'content'=>request('content'),
    ]);
});

Route::get('/students',[ApiController::class, 'index']);
Route::post('/students',[ApiController::class, 'create']);
Route::get('/students/{id}/show',[ApiController::class, 'show']);
Route::get('/students/id/update',[ApiController::class, 'show']);


Route::namespace('api')->prefix('v1')->group(function(){
    Route::resource('/exams',[ExamController::class],'index')->except('edit','create');
});

