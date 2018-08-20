<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $shirt_all = Product::all();
        $shirt_part = $shirt_all->chunk(4);

        return view('front.home',compact('shirt_part'));
    }

    public function shirts()
    {
        $shirts = Product::all();
        return view('front.shirts',compact('shirts'));
    }

    public function shirt()
    {
        return view('front.shirt');
    }
}
