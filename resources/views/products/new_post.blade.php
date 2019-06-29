@extends('layouts.master')
@section('title') New Post @stop
@section('content')
    <div class="content-wrapper">
    <div class="container">
        <div class="col-md-8 col-md-offset-2" >
            <div class="page-header" style="font-size: 20px; font-weight: bold">New Post</div>
            <form method="post" enctype="multipart/form-data" action="{{route('new.post')}}">
                <div class="form-group @if($errors->has('title')) has-error @endif">
                    @if($errors->has('title'))<span class="help-block">{{$errors->first('title')}}</span>  @endif
                    <label for="title" class="control-label">Post Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group @if($errors->has('body')) has-error @endif">
                    @if($errors->has('body'))<span class="help-block">{{$errors->first('body')}}</span> @endif
                    <label for="body" class="control-label">Post Body</label>
                    <textarea  class="form-control" name="body" id="body"></textarea>
                </div>
                <div class="form-group @if($errors->has('image')) has-error @endif">
                    @if($errors->has('image'))<span class="help-block">{{$errors->first('image')}}</span>  @endif
                    <label for="image" class="control-label">Post Image</label>
                    <input type="file" class="form-control" id="image" multiple name="image[]" style="height: auto">
                </div>
                <div class="form-group">
                    <label for="category" class="control-label"> </label>

                    <select id="category_id" name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach

                    </select>

                </div>
                <div class="form-group @if($errors->has('price')) has-error @endif">
                    @if($errors->has('price'))<span class="help-block">{{$errors->first('price')}}</span>  @endif
                    <label for="price" class="control-label">Price (mmk)</label>
                    <input type="number" step="100" class="form-control" id="price" name="price" style="height: auto" placeholder="ks">
                </div>
                <div class="form-group @if($errors->has('qty')) has-error @endif">
                    @if($errors->has('qty'))<span class="help-block">{{$errors->first('qty')}}</span>  @endif
                    <label for="qty" class="control-label">Quantity</label>
                    <input type="number" class="form-control" id="qty" name="qty" style="height: auto">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </div>
    </div>
@stop