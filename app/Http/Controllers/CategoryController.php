<?php

namespace App\Http\Controllers;

use App\Models\Category;
use const false;
use Illuminate\Http\Request;
use function redirect;
use const true;
use function view;

class CategoryController extends Controller
{
    public function index(){
       // return Category::where('parent_id',0)->with('subcategories')->get();
        return view('category.index',[
            'parentCategories' => Category::get(),
            'categories' => Category::with('subcategories')->get(),
            'vcats' => Category::where('parent_id',0)->with('subcategories')->get(),
        ]);
    }
    public function store(Request $request){
       Category::create($request->all());
       return redirect()->back();
    }

    public static function checkCategory($id){
       $cat =  Category::where('parent_id',$id)->first();
        if($cat){
            return false;
        }else{
            return true;
        }
    }

    public function delete($id){
        Category::findOrfail($id)->delete();
        return redirect()->back();
    }
}
