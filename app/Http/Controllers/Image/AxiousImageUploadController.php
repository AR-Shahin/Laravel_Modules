<?php

namespace App\Http\Controllers\Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Image;


class AxiousImageUploadController extends Controller
{
    public function index(){
        if(View::exists('image_upload.index')){
            return view('image_upload.index');
        }
    }

    public function store(Request $request){
        if(Image::create(['path' =>$request->file('file')->store('public\files')])){
            return $this->returnResponse('INSERT','',201,'');
        }
         else{
             return $this->returnResponse('NOT_INSERT','',400,'');
        }   
    }

     public function get()
    {
        return $this->returnResponse('','',200,Image::latest()->get());
    }
     public function download(Request $request)
    {
        //return Str::substr($request->path,13);
      //  return Storage::download('$request->path');
        if(Storage::exists($request->path)){

           Storage::download(Str::substr($request->path,0));
        }
    }
    
    public function delete(Request $request){

        $file = Image::find($request->id);
        Storage::delete($file->path);
         $file->delete();
         return $this->returnResponse('DELETE','',200,'');
    }
}

