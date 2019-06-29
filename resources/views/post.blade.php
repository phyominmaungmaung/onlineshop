@extends('layouts.master')
@section('title')
    Posts
    @stop
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container">

                <div class="panel panel-primary">
                    <div class="panel-body">
                        <table class="table table-responsive" id="dt">
                            <thead>
                            <tr>
                                <td>Title</td>
                                <td>Image</td>
                                <td>Instructions</td>
                                <td>Category Name</td>
                                <td>Price</td>
                                <td>Qty</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                        <td><h3 style="font-weight: bold">{{$post->title}}</h3></td>
                        <td class="col-sm-1">
                            <a  data-toggle="modal" data-target="#m{{$post->id}}">
                                <img src="/posts/{{$post->postimage[0]->img_name}}" class="img-responsive img-thumbnail">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="m{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @foreach($post->postimage as $i)
                                                <img src="/posts/{{$i->img_name}}"  class="img-responsive img-thumbnail">

                                            @endforeach
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><p>{{$post->body}}</p></td>
                            <td>
                               {{$post->category->name}}
                            </td>
                                    <td>{{$post->price}}</td>
                                    <td>{{$post->qty}}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-cogs"></i>
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                       <li class="dropdown-item"> <a class="btn btn-danger" data-toggle="modal" data-target="#del">
                                                <i class="fa fa-trash"></i>
                                        </a></li>
                                            <li class="dropdown-item"><a class="btn btn-primary" data-toggle="modal" data-target="#e{{$post->id}}">
                                                <i class="fa fa-edit"></i>
                                            </a></li>
                                    </ul>
                                </div>
                            </td></tr>
                                @endforeach
                            </tbody>
                        </table>
                    @foreach($posts as $post)
                        <!-- Modal edit-->
                        <div class="modal fade" id="e{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="post" enctype="multipart/form-data" action="{{route('post.update',['id'=>$post->id])}}">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="category_id">Update</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                            <div class="form-group @if($errors->has('title')) has-error @endif">
                                                @if($errors->has('title'))<span class="help-block">{{$errors->first('title')}}</span>  @endif
                                                <label for="title" class="control-label">Post Title</label>
                                                <input value="{{$post->title}}" type="text" name="title" id="title" class="form-control" >
                                            </div>
                                            <div class="form-group @if($errors->has('body')) has-error @endif">
                                                @if($errors->has('body'))<span class="help-block">{{$errors->first('body')}}</span> @endif
                                                <label for="body" class="control-label">Post Body</label>
                                                <textarea value="{{$post->body}}" class="form-control" name="body" id="body"></textarea>
                                            </div>
                                            <div class="form-group @if($errors->has('image')) has-error @endif">
                                                @if($errors->has('image'))<span class="help-block">{{$errors->first('image')}}</span>  @endif
                                                <label for="image" class="control-label">Post Image</label>
                                                <input type="file" class="form-control" id="image" multiple name="image[]" style="height: auto">
                                            </div>
                                            <div class="form-group">
                                                <label for="category" class="control-label"> </label>

                                                <select id="category_id" name="category_id" class="form-control">
                                                    @foreach($cats as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                            {{csrf_field()}}

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" >Update</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="del">Are you sure want to Delete?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{route('post.del',['post.del'=>$post->id])}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>


        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
    @stop