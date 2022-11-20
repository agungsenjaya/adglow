<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\MiniSeries;

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

    public function miniseries()
    {
        return view('client.miniseries')->with('miniseries',MiniSeries::all());
    }

    public function miniseries_view($slug)
    {
        $data = MiniSeries::where('slug',$slug)->first();
        return view('client.miniseries_view',compact('data'))->with('miniseries',MiniSeries::all());
    }
}
