<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\MovieController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/trending', function () {
    $page = 10;
    $page = ($page >= 1) ?: 1;
    dd($page);
});

/*
Route::group(['namespace' => '\App\Http\Controllers\Api', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified']], function() {
    Route::get('/movies', [MovieController::class, 'list'])->name('movies.list');
});*/
/*
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/movies', [MovieController::class, 'list'])->name('movies.list');
  });
  */
  //Route::get('/movies', [MovieController::class, 'list'])->name('movies.list');
/*
  Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'shared.ui',
    'verified',
])->group(function () {
    Route::get('/movies', [MovieController::class, 'list'])->name('movies.list');
});
*/


Route::prefix('/movies')->name('movies.')->middleware('guest')->group(function () {
	// List
    Route::get('/', [MovieController::class, 'list'])->name('list');
    // Read -- Get
    Route::get('/{id}', [MovieController::class, 'read'])->name('read')
        ->where('id', '[0-9]*')
        ;

    /*
	// Create -- Post
	Route::post('/c', [PostController::class, 'create'])->name('create');
	// Read -- Get
    Route::get('/{id}', [PostController::class, 'read'])->name('read')
        ->where('id', '[1-9][0-9]*');
	// Update -- PATCH -- Put (insert or Update)
    Route::patch('/{id}', [PostController::class, 'update'])->name('update')
        ->where('id', '[1-9][0-9]*');
	// Delete
    Route::delete('/{id}', [PostController::class, 'delete'])->name('delete')
        ->where('id', '[1-9][0-9]*');
*/
});
