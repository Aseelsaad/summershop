<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        //Get home page with passing outfits to display
        $shirts=Product::all();

        return view('front.home',compact('shirts'));
    }

    public function contact()
    {
        //Get contact us page
        return view('front.contact');
    }

    public function shirts()
    {
        //Get Outfits page with passing outfits to display

        $shirts=Product::all();
        return view('front.shirts',compact('shirts'));
    }

    public function shirt()
    {
        //Get Single outfit  with passing outfits to display
        $shirts=Product::all();
        return view('front.shirt',compact('shirts'));
    }
}
