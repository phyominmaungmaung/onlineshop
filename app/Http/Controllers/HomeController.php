<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postimage;
use App\Post;
use App\Category;
class HomeController extends Controller
{
    public function getWelcome(){
        return view('welcome');
    }
    public function getShop(){
        return view('layouts.front.shop');
    }
    public function getFrontcat(){
        $cats=Category::all();
        return view('layouts.front.frontcat')->with(['cats'=>$cats]);
    }
    public function getCart(){
        return view('layouts.front.cart');
    }

    public function getCheckout(){
        return view('layouts.front.checkout');
    }
}
