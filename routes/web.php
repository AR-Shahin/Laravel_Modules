<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Image\AxiousImageUploadController;
use App\Http\Controllers\TranslateController;
use Stichoza\GoogleTranslate\GoogleTranslate;

Route::get('/', function () {
//    $tr = new GoogleTranslate();
//    $tr->setSource('en');
//    $tr->setTarget('bn');
//    echo $tr->translate('Hello World!');
    return view('welcome');
});

Route::prefix('image')->name('image.')->namespace('Image')->group(function () {
    Route::get('index',[AxiousImageUploadController::class,'index'] );
    Route::post('store',[AxiousImageUploadController::class,'store'])->name('store');
    Route::get('get',[AxiousImageUploadController::class,'get'])->name('get');
    Route::get('download',[AxiousImageUploadController::class,'download'])->name('download');
    Route::delete('delete',[AxiousImageUploadController::class,'delete'])->name('delete');
});

//Category
Route::prefix('category')->name('category.')->group(function (){
    Route::get('index',[CategoryController::class,'index'] )->name('index');
    Route::post('store',[CategoryController::class,'store'] )->name('store');
    Route::get('delete/{id}',[CategoryController::class,'delete'] )->name('delete');
});

//Category
Route::prefix('translate')->name('translate.')->group(function (){
    Route::get('index',[TranslateController::class,'index'] )->name('index');
    Route::get('translate',[TranslateController::class,'translate'])->name('word');
});
