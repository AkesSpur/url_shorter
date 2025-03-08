<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function ($data = null) {
    $data = session()->get('data');
    if (isset($data)) {
        return view('home',compact('data'));
    } else {
        return view('home');       
    }
    
})->name('base.route');

Route::resource('url', UrlController::class)
->only(['index', 'store']);

Route::get('/{id}',function (string $id){
    $urlFetcher = new UrlController;
    $urlFetcher->show($id);
});
