<?php

use App\Http\Controllers\Admin\CatelogueController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->group(function(){

    Route::get('/',function(){
        return view('admin.dashboard');
    })->middleware(['auth', 'verified']);
    Route::prefix('catelogues')->as('catelogues.')->group(function(){
        Route::get('index',        [CatelogueController::class,'index'])->middleware(['auth', 'verified'])->name('index');
        Route::get('create',            [CatelogueController::class,'create'])->middleware(['auth', 'verified'])->name('create');
        Route::post('store',            [CatelogueController::class,'store'])->middleware(['auth', 'verified'])->name('store');
        Route::get('show/{id}',         [CatelogueController::class,'show'])->middleware(['auth', 'verified'])->name('show');
        Route::get('{id}/edit',         [CatelogueController::class,'edit'])->middleware(['auth', 'verified'])->name('edit');
        Route::put('{id}/update',       [CatelogueController::class,'update'])->middleware(['auth', 'verified'])->name('update');
        // delete
        Route::delete('{id}/destroy',   [CatelogueController::class,'destroy'])->name('destroy');
        Route::get('trash',[CatelogueController::class,'trash'])->name('trash');
        Route::delete('{id}/force-delete',[CatelogueController::class,'forceDelete'])->name('force-delete');
        Route::get('{id}/restore',[CatelogueController::class,'restore'])->name('restore');
    });
    Route::resource('products',ProductController::class);
});
