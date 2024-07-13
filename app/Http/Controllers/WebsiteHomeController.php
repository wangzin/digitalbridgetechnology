<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteHomeController extends Controller
{
    public function index(){
        $page="home";
        return view('index',['data'=>$page]);
    }
    public function about(){
        $page="about";
        return view('index',['data'=>$page]);
    }
    public function service(){
        $page="service";
        return view('index',['data'=>$page]);
    }
    public function contact(){
        $page="contact";
        return view('index',['data'=>$page]);
    }
    
    public function savecontact(){
        $page="contact";
        return view('index',['data'=>$page]);
    }
}
