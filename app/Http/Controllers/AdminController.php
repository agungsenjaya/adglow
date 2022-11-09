<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use DB,Validator,Str,Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('layouts.home');
    }

    public function movies()
    {
        return view('layouts.movies')->with('movie', Movie::all());
    }
    
    public function movies_create()
    {
        return view('layouts.movies_create');
    }
    
    public function movies_edit($id)
    {
        $data = Movie::find($id);
        return view('layouts.movies_edit',compact('data'));
    }

    public function movies_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title' => 'required|unique:movies',
            'img' => 'required'
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $img = $request->img;
            $img_new = time().$img->getClientOriginalName();
            $img->move('img/movies', $img_new);

            $data = Movie::create([
                'title' => $request->title,
                'img' => 'img/movies/' . $img_new,
                'tgl_tayang' => $request->tgl_tayang,
                'producer' => $request->producer,
                'duration' => $request->duration ? $request->duration : NULL,
                'director' => $request->director,
                'artist' => $request->artist ? $request->artist : NULL,
                'trailer' => $request->trailer ? $request->trailer : NULL,
                'link' => $request->link ? $request->link : NULL,
                'description' => $request->description,
                'slug' => Str::slug($request->title),
            ]);
            if($data){
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.movies');
            }
        }
    }

    public function movies_update(Request $request, $id)
    {
        $data = Movie::find($id);
        $valid = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            if ($request->hasFile('img')) {
                $img = $request->img;
                $img_new = time().$img->getClientOriginalName();
                $img->move('img/movies', $img_new);
                $data->img = 'img/movies/' . $img_new;
            }
            $data->title = $request->title;
            $data->tgl_tayang = $request->tgl_tayang;
            $data->producer = $request->producer;
            $data->duration = $request->duration ? $request->duration : NULL;
            $data->director = $request->director;
            $data->artist = $request->artist ? $request->artist : NULL;
            $data->trailer = $request->trailer ? $request->trailer : NULL;
            $data->link = $request->link ? $request->link : NULL;
            $data->description = $request->description;
            $data->slug = Str::slug($request->title);
            $data->save();
            
            if ($data) {
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.movies');
            }
        }
    }

}
