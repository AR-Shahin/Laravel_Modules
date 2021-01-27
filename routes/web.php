<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Image\AxiousImageUploadController;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
unlink('public\files/4ISiWbiwZSpviTp6MksFXaqaEdoaCSPc6n1giYHk.gif');
   
    return view('welcome');
});

Route::prefix('image')->name('image.')->namespace('Image')->group(function () {
    Route::get('index',[AxiousImageUploadController::class,'index'] );
    Route::post('store',[AxiousImageUploadController::class,'store'])->name('store');
    Route::get('get',[AxiousImageUploadController::class,'get'])->name('get');
    Route::get('download',[AxiousImageUploadController::class,'download'])->name('download');
});
