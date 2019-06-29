<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
class AdminController extends Controller
{
    public function getDashboard(){
        return view('dashboard');
    }
}
