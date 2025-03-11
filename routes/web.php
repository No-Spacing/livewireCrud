<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\CreatePost;
use App\Livewire\Login;
use App\Livewire\Register;


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
    
    
Route::group(['middleware'=>['user']], function(){
    Route::get('/', Login::class);
    Route::get('register', Register::class);
    
    Route::get('/create-post', CreatePost::class); 
    Route::get('/logout', function () {
        session()->flush();
        return redirect('/');
    });
});
