<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class ClientController extends Controller
{
    public function home()
    {
        return view('client.home');
    }

    public function movies()
    {
        return view('client.movies')->with('movies', Movie::all());
    }
    
    public function movies_view($slug)
    {
        $data = Movie::where('slug',$slug)->first();
        return view('client.movies_view',compact('data'))->with('movies',Movie::all());
    }
}
