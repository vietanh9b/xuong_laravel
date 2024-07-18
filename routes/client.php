<?php

use App\Http\Controllers\Admin\CatelogueController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('client')->as('client.')->group(function(){
    Route::get('/',[ClientProductController::class,'index']);
});