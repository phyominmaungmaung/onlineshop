@extends('layouts.master')
@section('title') Category list @stop
@section('content')
    <div class="content-wrapper">
        <section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header">Category List</div>
                    <div class="box-body">
                        <table class="table" id="dt">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Category name</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cats as $cat)
                                <tr>
                                    <td>{{$cat->id}}</td>
                                    <td>{{$cat->name}}</td>
                                    <td><a href="{{route('cat.del',['cat.del'=>$cat->id])}}" class="text-danger">Remove</a> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header">New Category</div>
                    <div class="box-body">
                        <form method="post" action="{{route('new.cat')}}">
                            <div class="form-group">
                                <label for="cat_name" class="control-label">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">Save</button>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </section>
    </div>
@stop