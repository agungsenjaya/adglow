<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\MiniSeries;
use App\Commercial;
use App\Music;
use DB,Validator,Str,Session;
use stdClass;

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
                return redirect()->route('admin.miniseries');
            }
        }
    }

    public function miniseries()
    {
        return view('layouts.miniseries')->with('miniseries', MiniSeries::all());
    }
    
    public function miniseries_create()
    {
        return view('layouts.miniseries_create');
    }
    
    public function miniseries_edit($id)
    {
        $data = MiniSeries::find($id);
        return view('layouts.miniseries_edit',compact('data'));
    }

    public function miniseries_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title' => 'required|unique:miniseries',
            'img' => 'required'
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $img = $request->img;
            $img_new = time().$img->getClientOriginalName();
            $img->move('img/miniseries', $img_new);

            $data = MiniSeries::create([
                'title' => $request->title,
                'img' => 'img/miniseries/' . $img_new,
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
                return redirect()->route('admin.miniseries');
            }
        }
    }

    public function miniseries_update(Request $request, $id)
    {
        $data = MiniSeries::find($id);
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
                $img->move('img/miniseries', $img_new);
                $data->img = 'img/miniseries/' . $img_new;
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
                return redirect()->route('admin.miniseries');
            }
        }
    }

    public function commercial()
    {
        return view('layouts.commercial')->with('commercial', Commercial::all());
    }
    
    public function commercial_create()
    {
        return view('layouts.commercial_create');
    }
    
    public function commercial_edit($id)
    {
        $data = Commercial::find($id);
        return view('layouts.commercial_edit',compact('data'));
    }

    public function commercial_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title' => 'required|unique:commercials',
            'img' => 'required'
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $img = $request->img;
            $img_new = time().$img->getClientOriginalName();
            $img->move('img/commercial', $img_new);

            $data = Commercial::create([
                'title' => $request->title,
                'img' => 'img/commercial/' . $img_new,
                'tgl_tayang' => $request->tgl_tayang ? $request->tgl_tayang : NULL,
                'producer' => $request->producer,
                'director' => $request->director,
                'artist' => $request->artist ? $request->artist : NULL,
                'trailer' => $request->trailer ? $request->trailer : NULL,
                'link' => $request->link ? $request->link : NULL,
                'description' => $request->description ? $request->description : NULL,
                'slug' => Str::slug($request->title),
            ]);
            if($data){
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.commercial');
            }
        }
    }

    public function commercial_update(Request $request, $id)
    {
        $data = Commercial::find($id);
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
                $img->move('img/commercial', $img_new);
                $data->img = 'img/commercial/' . $img_new;
            }
            $data->title = $request->title;
            $data->tgl_tayang = $request->tgl_tayang ? $request->tgl_tayang : NULL;
            $data->producer = $request->producer;
            $data->director = $request->director;
            $data->artist = $request->artist ? $request->artist : NULL;
            $data->trailer = $request->trailer ? $request->trailer : NULL;
            $data->link = $request->link ? $request->link : NULL;
            $data->description = $request->description ? $request->description : NULL;
            $data->slug = Str::slug($request->title);
            $data->save();
            
            if ($data) {
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.commercial');
            }
        }
    }

    public function music()
    {
        return view('layouts.music')->with('music', Music::all());
    }
    
    public function music_create()
    {
        return view('layouts.music_create');
    }
    
    public function music_edit($id)
    {
        $data = Music::find($id);
        return view('layouts.music_edit',compact('data'));
    }

    public function music_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title' => 'required|unique:music',
            'img' => 'required'
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $img = $request->img;
            $img_new = time().$img->getClientOriginalName();
            $img->move('img/music', $img_new);

            $link = new stdClass();
            $link->spotify = $request->spotify ? $request->spotify : NULL;
            $link->joox = $request->joox ? $request->joox : NULL;
            $link->apple = $request->apple ? $request->apple : NULL;
            $link = array($link);

            $data = Music::create([
                'title' => $request->title,
                'img' => 'img/music/' . $img_new,
                'tgl_tayang' => $request->tgl_tayang ? $request->tgl_tayang : NULL,
                'creator' => $request->creator ? $request->creator : NULL,
                'artist' => $request->artist ? $request->artist : NULL,
                'trailer' => $request->trailer ? $request->trailer : NULL,
                'link' => json_encode($link),
                'description' => $request->description ? $request->description : NULL,
                'slug' => Str::slug($request->title),
            ]);
            if($data){
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.music');
            }
        }
    }

    public function music_update(Request $request, $id)
    {
        $data = Music::find($id);
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
                $img->move('img/music', $img_new);
                $data->img = 'img/music/' . $img_new;
            }

            $link = new stdClass();
            $link->spotify = $request->spotify ? $request->spotify : NULL;
            $link->joox = $request->joox ? $request->joox : NULL;
            $link->apple = $request->apple ? $request->apple : NULL;
            $link = array($link);

            $data->title = $request->title;
            $data->tgl_tayang = $request->tgl_tayang ? $request->tgl_tayang : NULL;
            $data->artist = $request->artist ? $request->artist : NULL;
            $data->creator = $request->creator ? $request->creator : NULL;
            $data->trailer = $request->trailer ? $request->trailer : NULL;
            $data->link = json_encode($link);
            $data->description = $request->description ? $request->description : NULL;
            $data->slug = Str::slug($request->title);
            $data->save();
            
            if ($data) {
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.music');
            }
        }
    }

}
