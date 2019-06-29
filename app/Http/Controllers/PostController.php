<?php

namespace App\Http\Controllers;

use App\Postimage;
use Illuminate\Http\Request;
use App\Category;
use Auth;
use App\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function getCategory(){
        $cats=Category::all();
        return view('category')->with(['cats'=>$cats]);
    }
    public function postNewCategory(Request $request){
        $cat=new Category();
        $cat->name=$request['name'];
        $cat->save();
        return redirect()->back();
    }
    public function getDelCat($id){
        $catgry=Category::where('id',$id)->first();
        $catgry->delete();
        return redirect()->back();
    }
    public function getNewPost(){
        $cats=Category::all();
        return view('products.new_post')->with(['cats'=>$cats]);
    }
    public function postNewPost(Request $request){
        $img=$request->file('image');


       $this->validate($request,[
           'title'=>'required',
           'body'=>'required',
           'category_id'=>'required',
           'price'=>'required',
           'qty'=>'required'
       ]);

       $title=$request['title'];
       $slug=$request['title'];
       $body=$request['body'];
       $price=$request['price'];
       $qty=$request['qty'];
       $user_id=Auth::User()->id;
       //$image_name=$slug.'.'.$request->file('image')->getClientOriginalExtension();
      // $image_file=$request->file('image');

       $post=new Post();
       $post->title=$title;
       $post->slug=$slug;
       $post->body=$body;
       $post->price=$price;
       $post->qty=$qty;
       $post->user_id=$user_id;
       //$post->image=$image_name;
       $post->category_id=$request['category_id'];
       $post->save();
      // move_uploaded_file($image_file,public_path()."/posts/$image_name");

       foreach ($img as $i){

           $img_name=$i->getClientOriginalName();
           $post_id=$post->id;
           $p=new Postimage();
           $p->img_name=$img_name;
           $p->post_id=$post_id;
           $p->save();
           move_uploaded_file($i,public_path()."/posts/$img_name");

       }

       return redirect()->back();

    }
    public function getDelPost($id){
        $cats=Postimage::where('post_id',$id)->get();
        foreach ($cats as $c){
            $c->delete();
        }
        $cat=Post::where('id',$id)->first();
        $cat->delete();
        return redirect()->back();
    }
    public function postUpdate($id, Request $request)
    {
        $img=$request->file('image');
        $title=$request['title'];
//        $slug=$request['title'];
        $body=$request['body'];


        $post=Post::whereId($id)->firstOrFail();
        $post->title=$title;
        $post->body=$body;
//        $image_name=$slug.'.'.$request->file('image')->getClientOriginalExtension();
//        $image_file=$request->file('image');
        $post->update();
//        move_uploaded_file($image_file,public_path()."/posts/$image_name");
        foreach ($post->postimage as $i){
            $path=public_path("posts");
            File::delete($path.$i->img_name);
        }
        foreach ($img as $im){
            $image_name=$im->getClientOriginalName();
            $post_id=$post->id;
            $p=new Postimage();
            $p->img_name=$image_name;
            $p->post_id=$post_id;
            $p->update();
            move_uploaded_file($im,public_path()."/posts/$image_name");
        }
        return redirect()->back()->with('info','Update successful');
    }
    public function getPost(){
        $cats=Category::all();
        $posts=Post::OrderBy('id','desc')->with('user')->paginate('3');
        return view('post')->with(['posts'=>$posts])->with(['cats'=>$cats]);
    }

}
