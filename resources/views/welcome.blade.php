@extends('layouts.app')
@section('app_content')
    <div class="container mt-4 pt-5 text-center">
        <h1>Laravel Modules practice</h1>
        <p><a href="{{route('category.index')}}">Category</a></p>
        <p><a href="{{route('translate.index')}}">Translate</a></p>
        </div>
    </div>
    @stop