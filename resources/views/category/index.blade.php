@extends('layouts.app')
@section('title','Category ')
@section('app_content')
    <div class="container mt-4 pt-2 text-center">
        <h1>Multiple Category</h1>
        <hr>
        <p><a href="{{url('/')}}">Home</a></p>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h4>All Category</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Parent</th>
                        <th>Child</th>
                        <th>Action</th>
                    </tr>
                    @foreach($categories as $key=>$category)
                        <tr>
                            <th>{{++$key}}</th>
                            <th>{{$category->name}}</th>
                            @if($category->parent_id == 0)
                                <th>
                                    @if(count($category->subcategories))
                                        @foreach($category->subcategories as $key =>$subcategory)
                                            {{$subcategory->name}} |
                                        @endforeach
                                    @else
                                        Parent
                                    @endif
                                </th>
                            @else
                                <th>
                                    @if(count($category->subcategories))
                                        @foreach($category->subcategories as $key =>$subcategory)
                                            {{$subcategory->name}} |
                                        @endforeach
                                    @else
                                        Child
                                    @endif
                                </th>
                            @endif
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                                @php
                                    $cat = App\Http\Controllers\CategoryController::checkCategory($category->id)
                                @endphp
                                @if($cat)
                                    <a href="{{route('category.delete',$category->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-4">
                <h4>Add Category</h4>
                <form action="{{route('category.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name: </label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <select name="parent_id" id="" class="form-control">
                            <option value="0">Parent Category</option>
                            @foreach($parentCategories as $parentCategory)
                                <option value="{{$parentCategory->id}}">{{ucwords($parentCategory->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>
    <hr>
    <div class="container">

        <hr>

        @foreach($vcats as $category)

            {{$category->name}}

            @if(count($category->subcategories))
                @include('category.sub_cat',['subcategories' => $category->subcategories])
            @endif

        @endforeach

    </div>
@stop