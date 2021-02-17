<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;
use function view;

class TranslateController extends Controller
{
    public function index(){
        return view( 'translate.index');
    }
    public function translate(Request $request){
        $tr = new GoogleTranslate();
        $tr->setSource($request->source_lan);
        $tr->setTarget($request->res_lan);
        return $tr->translate($request->word);
    }
}
