@extends('layouts.front.app')
@section('title')
    Category
@stop
@section('content')
    <div class="brands-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <h2 class="section-title">Category Lists</h2>
                            <div class="box-body">
                                <table class="table" id="dt">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Category name</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cats as $cat)
                                        <tr>
                                            <td>{{$cat->id}}</td>
                                            <td>{{$cat->name}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
@stop