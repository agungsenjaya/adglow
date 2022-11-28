<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\MiniSeries;
use App\Commercial;
use App\Music;
use App\Book;
use App\Documentary;
use App\News;

class ClientController extends Controller
{
    public function home()
    {
        return view('client.home')->with('movies', Movie::all())->with('news', News::all());
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
    
    public function commercial()
    {
        return view('client.commercial')->with('commercial',Commercial::all());
    }

    public function commercial_view($slug)
    {
        $data = Commercial::where('slug',$slug)->first();
        return view('client.commercial_view',compact('data'))->with('commercial',Commercial::all());
    }
    
    public function music()
    {
        return view('client.music')->with('music',Music::all());
    }

    public function music_view($slug)
    {
        $data = Music::where('slug',$slug)->first();
        return view('client.music_view',compact('data'))->with('music',Music::all());
    }
    
    public function book()
    {
        return view('client.book')->with('book',Book::all());
    }

    public function book_view($slug)
    {
        $data = Book::where('slug',$slug)->first();
        return view('client.book_view',compact('data'))->with('book',Book::all());
    }
    
    public function documentary()
    {
        return view('client.documentary')->with('documentary',Documentary::all());
    }

    public function documentary_view($slug)
    {
        $data = Documentary::where('slug',$slug)->first();
        return view('client.documentary_view',compact('data'))->with('documentary',Documentary::all());
    }
    
    public function news()
    {
        return view('client.news')->with('news',News::all());
    }

    public function news_view($slug)
    {
        $data = News::where('slug',$slug)->first();
        return view('client.news_view',compact('data'))->with('news',News::all());
    }
}
