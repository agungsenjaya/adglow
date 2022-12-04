<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\MiniSeries;
use App\Commercial;
use App\Music;
use App\Book;
use App\News;
use App\Documentary;
use App\User;
use App\Genre;
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
        return view('layouts.home')
        ->with('movies', Movie::count())
        ->with('miniseries', MiniSeries::count())
        ->with('commercial', Commercial::count())
        ->with('music', Music::count())
        ->with('book', Book::count())
        ->with('news', News::count())
        ->with('documentary', Documentary::count());
    }

    public function account()
    {
        return view('layouts.account'); 
    }

    public function account_update(Request $request)
    {
        $data = User::find($request->id);
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 
            $data->name = $request->name; 
            $data->email = $request->email; 
            if ($request->password) {
                $dat =  Validator::make($request->all(), [
                    'password' => ['required', 'string', 'confirmed'],
                ]);
                if ($dat->fails()) {
                    Session::flash('failed','Data gagal input, coba periksa kembali.');
                    return redirect()->back()->withErrors($valid->errors())->withInput();
                }
                $data->password = Hash::make($request->password); 
            }
            $data->save();

            if ($data) {
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.account');
            }
        }
    }

    public function movies()
    {
        return view('layouts.movies')->with('movie', Movie::all());
    }
    
    public function movies_create()
    {
        return view('layouts.movies_create')->with('genre', Genre::all());
    }
    
    public function movies_edit($id)
    {
        $data = Movie::find($id);
        return view('layouts.movies_edit',compact('data'))->with('genre',Genre::all());
    }

    public function movies_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title' => 'required|unique:movies',
            'img_clip' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $img_clip = $request->img_clip;
            $img_clip_new = time().$img_clip->getClientOriginalName();
            $img_clip->move('img/movies', $img_clip_new);
            
            $img_background = $request->img_background;
            $img_background_new = time().$img_background->getClientOriginalName();
            $img_background->move('img/movies', $img_background_new);
            
            $img_logo = $request->img_logo;
            $img_logo_new = time().$img_logo->getClientOriginalName();
            $img_logo->move('img/movies', $img_logo_new);
            
            $new_highlight = [];
            foreach ($request->img_highlight as $img_light) {
                $a = $img_light;
                $b = time().$a->getClientOriginalName();
                $a->move('img/movies', $b);
                $c = 'img/movies/' . $b;
                array_push($new_highlight,$c);
            }

            $data = Movie::create([
                'title' => $request->title,
                'img_clip' => 'img/movies/' . $img_clip_new,
                'img_background' => 'img/movies/' . $img_background_new,
                'img_logo' => 'img/movies/' . $img_logo_new,
                'img_highlight' => count($new_highlight) ? json_encode($new_highlight) : NULL,
                'genre_id' => $request->genre_id ? $request->genre_id : NULL,
                'tgl_tayang' => $request->tgl_tayang ? $request->tgl_tayang : NULL,
                'producer' => $request->producer,
                'duration' => $request->duration ? $request->duration : NULL,
                'director' => $request->director,
                'artist' => $request->artist ? $request->artist : NULL,
                'trailer' => $request->trailer ? $request->trailer : NULL,
                'genre_id' => $request->genre_id ? json_encode($request->genre_id) : NULL,
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
            if ($request->hasFile('img_clip')) {
                $img_clip = $request->img_clip;
                $img_clip_new = time().$img_clip->getClientOriginalName();
                $img_clip->move('img/movies', $img_clip_new);
                $data->img_clip = 'img/movies/' . $img_clip_new;
            }
            
            if ($request->hasFile('img_background')) {
                $img_background = $request->img_background;
                $img_background_new = time().$img_background->getClientOriginalName();
                $img_background->move('img/movies', $img_background_new);
                $data->img_background = 'img/movies/' . $img_background_new;
            }
            
            if ($request->hasFile('img_logo')) {
                $img_logo = $request->img_logo;
                $img_logo_new = time().$img_logo->getClientOriginalName();
                $img_logo->move('img/movies', $img_logo_new);
                $data->img_logo = 'img/movies/' . $img_logo_new;
            }
            
            
            if ($request->hasFile('img_highlight')) {
                $new_highlight = [];
                foreach ($request->img_highlight as $img_light) {
                    $a = $img_light;
                    $b = time().$a->getClientOriginalName();
                    $a->move('img/movies', $b);
                    $c = 'img/movies/' . $b;
                    array_push($new_highlight,$c);
                }
                $data->img_highlight = json_encode($new_highlight);
            }

            $data->title = $request->title;
            $data->tgl_tayang = $request->tgl_tayang ? $request->tgl_tayang : NULL;
            $data->producer = $request->producer;
            $data->duration = $request->duration ? $request->duration : NULL;
            $data->director = $request->director;
            $data->artist = $request->artist ? $request->artist : NULL;
            $data->trailer = $request->trailer ? $request->trailer : NULL;
            $data->genre_id = $request->genre_id ? json_encode($request->genre_id) : NULL;
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

    public function miniseries()
    {
        return view('layouts.miniseries')->with('miniseries', MiniSeries::all());
    }
    
    public function miniseries_create()
    {
        return view('layouts.miniseries_create')->with('genre', Genre::all());
    }
    
    public function miniseries_edit($id)
    {
        $data = MiniSeries::find($id);
        return view('layouts.miniseries_edit',compact('data'))->with('genre', Genre::all());
    }

    public function miniseries_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title' => 'required|unique:miniseries',
            'img_clip' => 'required'
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $img_clip = $request->img_clip;
            $img_clip_new = time().$img_clip->getClientOriginalName();
            $img_clip->move('img/miniseries', $img_clip_new);

            $img_background = $request->img_background;
            $img_background_new = time().$img_background->getClientOriginalName();
            $img_background->move('img/miniseries', $img_background_new);
            
            $img_logo = $request->img_logo;
            $img_logo_new = time().$img_logo->getClientOriginalName();
            $img_logo->move('img/miniseries', $img_logo_new);

            $new_highlight = [];
            foreach ($request->img_highlight as $img_light) {
                $a = $img_light;
                $b = time().$a->getClientOriginalName();
                $a->move('img/miniseries', $b);
                $c = 'img/miniseries/' . $b;
                array_push($new_highlight,$c);
            }

            $data = MiniSeries::create([
                'title' => $request->title,
                'img_clip' => 'img/miniseries/' . $img_clip_new,
                'img_background' => 'img/miniseries/' . $img_background_new,
                'img_logo' => 'img/miniseries/' . $img_logo_new,
                'img_highlight' => count($new_highlight) ? json_encode($new_highlight) : NULL,
                'tgl_tayang' => $request->tgl_tayang,
                'producer' => $request->producer,
                'duration' => $request->duration ? $request->duration : NULL,
                'director' => $request->director,
                'artist' => $request->artist ? $request->artist : NULL,
                'trailer' => $request->trailer ? $request->trailer : NULL,
                'episode' => $request->episode ? $request->episode : NULL,
                'season' => $request->season ? $request->season : NULL,
                'genre_id' => $request->genre_id ? json_encode($request->genre_id) : NULL,
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
            if ($request->hasFile('img_clip')) {
                $img_clip = $request->img_clip;
                $img_clip_new = time().$img_clip->getClientOriginalName();
                $img_clip->move('img/miniseries', $img_clip_new);
                $data->img_clip = 'img/miniseries/' . $img_clip_new;
            }
            
            if ($request->hasFile('img_background')) {
                $img_background = $request->img_background;
                $img_background_new = time().$img_background->getClientOriginalName();
                $img_background->move('img/miniseries', $img_background_new);
                $data->img_background = 'img/miniseries/' . $img_background_new;
            }
            
            if ($request->hasFile('img_logo')) {
                $img_logo = $request->img_logo;
                $img_logo_new = time().$img_logo->getClientOriginalName();
                $img_logo->move('img/miniseries', $img_logo_new);
                $data->img_logo = 'img/miniseries/' . $img_logo_new;
            }

            if ($request->hasFile('img_highlight')) {
                $new_highlight = [];
                foreach ($request->img_highlight as $img_light) {
                    $a = $img_light;
                    $b = time().$a->getClientOriginalName();
                    $a->move('img/miniseries', $b);
                    $c = 'img/miniseries/' . $b;
                    array_push($new_highlight,$c);
                }
                $data->img_highlight = json_encode($new_highlight);
            }
            
            $data->title = $request->title;
            $data->tgl_tayang = $request->tgl_tayang;
            $data->producer = $request->producer;
            $data->director = $request->director;
            $data->artist = $request->artist ? $request->artist : NULL;
            $data->trailer = $request->trailer ? $request->trailer : NULL;
            $data->episode = $request->episode ? $request->episode : NULL;
            $data->season = $request->season ? $request->season : NULL;
            $data->genre_id = $request->genre_id ? json_encode($request->genre_id) : NULL;
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
            'img_clip' => 'required'
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $img_clip = $request->img_clip;
            $img_clip_new = time().$img_clip->getClientOriginalName();
            $img_clip->move('img/commercial', $img_clip_new);

            $new_highlight = [];
            foreach ($request->img_highlight as $img_light) {
                $a = $img_light;
                $b = time().$a->getClientOriginalName();
                $a->move('img/commercial', $b);
                $c = 'img/commercial/' . $b;
                array_push($new_highlight,$c);
            }

            $data = Commercial::create([
                'title' => $request->title,
                'artist' => $request->artist,
                'img_clip' => 'img/commercial/' . $img_clip_new,
                'img_highlight' => count($new_highlight) ? json_encode($new_highlight) : NULL,
                'tgl_tayang' => $request->tgl_tayang ? $request->tgl_tayang : NULL,
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
            if ($request->hasFile('img_clip')) {
                $img_clip = $request->img_clip;
                $img_clip_new = time().$img_clip->getClientOriginalName();
                $img_clip->move('img/commercial', $img_clip_new);
                $data->img_clip = 'img/commercial/' . $img_clip_new;
            }
            if ($request->hasFile('img_highlight')) {
                $new_highlight = [];
                foreach ($request->img_highlight as $img_light) {
                    $a = $img_light;
                    $b = time().$a->getClientOriginalName();
                    $a->move('img/commercial', $b);
                    $c = 'img/commercial/' . $b;
                    array_push($new_highlight,$c);
                }
                $data->img_highlight = json_encode($new_highlight);
            }
            $data->title = $request->title;
            $data->artist = $request->artist;
            $data->tgl_tayang = $request->tgl_tayang ? $request->tgl_tayang : NULL;
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
            'img_clip' => 'required'
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $img_clip = $request->img_clip;
            $img_clip_new = time().$img_clip->getClientOriginalName();
            $img_clip->move('img/music', $img_clip_new);

            $link = new stdClass();
            $link->spotify = $request->spotify ? $request->spotify : NULL;
            $link->joox = $request->joox ? $request->joox : NULL;
            $link->apple = $request->apple ? $request->apple : NULL;
            $link = array($link);

            $data = Music::create([
                'title' => $request->title,
                'img_clip' => 'img/music/' . $img_clip_new,
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
            if ($request->hasFile('img_clip')) {
                $img_clip = $request->img_clip;
                $img_clip_new = time().$img_clip->getClientOriginalName();
                $img_clip->move('img/music', $img_clip_new);
                $data->img_clip = 'img/music/' . $img_clip_new;
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

    public function book()
    {
        return view('layouts.book')->with('book', Book::all());
    }
    
    public function book_create()
    {
        return view('layouts.book_create');
    }
    
    public function book_edit($id)
    {
        $data = Book::find($id);
        return view('layouts.book_edit',compact('data'));
    }

    public function book_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title' => 'required|unique:books',
            'img_clip' => 'required'
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $img_clip = $request->img_clip;
            $img_clip_new = time().$img_clip->getClientOriginalName();
            $img_clip->move('img/book', $img_clip_new);

            $data = Book::create([
                'title' => $request->title,
                'img_clip' => 'img/book/' . $img_clip_new,
                'tgl_tayang' => $request->tgl_tayang ? $request->tgl_tayang : NULL,
                'link' => $request->link ? $request->link : NULL,
                'creator' => $request->creator ? $request->creator : NULL,
                'description' => $request->description ? $request->description : NULL,
                'slug' => Str::slug($request->title),
            ]);
            if($data){
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.book');
            }
        }
    }

    public function book_update(Request $request, $id)
    {
        $data = Book::find($id);
        $valid = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            if ($request->hasFile('img_clip')) {
                $img_clip = $request->img_clip;
                $img_clip_new = time().$img_clip->getClientOriginalName();
                $img_clip->move('img/book', $img_clip_new);
                $data->img_clip = 'img/book/' . $img_clip_new;
            }

            $data->title = $request->title;
            $data->link = $request->link ? $request->link : NULL;
            $data->tgl_tayang = $request->tgl_tayang ? $request->tgl_tayang : NULL;
            $data->creator = $request->creator ? $request->creator : NULL;
            $data->description = $request->description ? $request->description : NULL;
            $data->slug = Str::slug($request->title);
            $data->save();
            
            if ($data) {
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.book');
            }
        }
    }

    public function documentary()
    {
        return view('layouts.documentary')->with('documentary', Documentary::all());
    }
    
    public function documentary_create()
    {
        return view('layouts.documentary_create');
    }
    
    public function documentary_edit($id)
    {
        $data = Documentary::find($id);
        return view('layouts.documentary_edit',compact('data'));
    }

    public function documentary_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title' => 'required|unique:documentaries',
            'img_clip' => 'required'
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $img_clip = $request->img_clip;
            $img_clip_new = time().$img_clip->getClientOriginalName();
            $img_clip->move('img/documentary', $img_clip_new);

            $new_highlight = [];
            foreach ($request->img_highlight as $img_light) {
                $a = $img_light;
                $b = time().$a->getClientOriginalName();
                $a->move('img/documentary', $b);
                $c = 'img/documentary/' . $b;
                array_push($new_highlight,$c);
            }

            $data = Documentary::create([
                'title' => $request->title,
                'category' => $request->category,
                'img_clip' => 'img/documentary/' . $img_clip_new,
                'img_highlight' => count($new_highlight) ? json_encode($new_highlight) : NULL,
                'tgl_tayang' => $request->tgl_tayang ? $request->tgl_tayang : NULL,
                'producer' => $request->producer ? $request->producer : NULL,
                'director' => $request->director ? $request->director : NULL,
                'trailer' => $request->trailer ? $request->trailer : NULL,
                'link' => $request->link ? $request->link : NULL,
                'artist' => $request->artist ? $request->artist : NULL,
                'description' => $request->description ? $request->description : NULL,
                'slug' => Str::slug($request->title),
            ]);
            if($data){
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.documentary');
            }
        }
    }

    public function documentary_update(Request $request, $id)
    {
        $data = Documentary::find($id);
        $valid = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            if ($request->hasFile('img_clip')) {
                $img_clip = $request->img;
                $img_clip_new = time().$img_clip->getClientOriginalName();
                $img_clip->move('img/documentary', $img_clip_new);
                $data->img_clip = 'img/documentary/' . $img_clip_new;
            }

            $data->title = $request->title;
            $data->category = $request->category;
            $data->artist = $request->artist ? $request->artist : NULL;
            $data->tgl_tayang = $request->tgl_tayang ? $request->tgl_tayang : NULL;
            $data->director = $request->director ? $request->director : NULL;
            $data->producer = $request->producer ? $request->producer : NULL;
            $data->trailer = $request->trailer ? $request->trailer : NULL;
            $data->link = $request->link ? $request->link : NULL;
            $data->description = $request->description ? $request->description : NULL;
            $data->slug = Str::slug($request->title);
            $data->save();
            
            if ($data) {
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.documentary');
            }
        }
    }

    public function news()
    {
        return view('layouts.news')->with('news', News::all());
    }
    
    public function news_create()
    {
        return view('layouts.news_create');
    }
    
    public function news_edit($id)
    {
        $data = News::find($id);
        return view('layouts.news_edit',compact('data'));
    }

    public function news_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title' => 'required|unique:news',
            'img_clip' => 'required'
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $img_clip = $request->img_clip;
            $img_clip_new = time().$img_clip->getClientOriginalName();
            $img_clip->move('img/news', $img_clip_new);

            $detail=$request->input('description');
            $dom = new \DomDocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
            $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $img){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= "/img/news/" . time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
            $detail = $dom->saveHTML();

            $data = News::create([
                'title' => $request->title,
                'img_clip' => 'img/news/' . $img_clip_new,
                'description' => $detail,
                'slug' => Str::slug($request->title),
            ]);
            if ($data) {
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.news');
            }
        }
    }

    public function news_update(Request $request, $id)
    {
        $data = News::find($id);
        $valid = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            if ($request->hasFile('img_clip')) {
                $img_clip = $request->img_clip;
                $img_clip_new = time().$img_clip->getClientOriginalName();
                $img_clip->move('img/news', $img_clip_new);
                $data->img_clip = 'img/news/' . $img_clip_new;
            }

            $detail=$request->input('description');
            $dom = new \DomDocument();
            @$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
            $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $imgg){
                $datas = $imgg->getAttribute('src');
                $ext = pathinfo($datas, PATHINFO_EXTENSION);
                if ($ext != "png") {
                    list($type, $datas) = explode(';', $datas);
                    list(, $datas)      = explode(',', $datas);
                    $datas = base64_decode($datas);
                    $image_name= "/img/news/" . time().$k.'.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $datas);
                    $imgg->removeAttribute('src');
                    $imgg->setAttribute('src', $image_name);
                }
            }
            $detail = $dom->saveHTML();

            $data->title = $request->title;
            $data->description = $detail;
            $data->slug = Str::slug($request->title);
            $data->save();
            if ($data) {
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.news');
            }
        }
    }

    public function genre()
    {
        return view('layouts.genre')->with('genre', Genre::all());
    }
    
    public function genre_create()
    {
        return view('layouts.genre_create');
    }
    
    public function genre_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title' => 'required|unique:genres',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $data = Genre::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title)
            ]);
            if($data){
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.genre');
            }
        }
    }

    public function genre_edit($id)
    {
        $data = Genre::find($id);
        return view('layouts.genre_edit', compact('data'));
    }

    public function genre_update(Request $request, $id)
    {
        $data = Genre::find($id);
        $valid = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data gagal input, coba periksa kembali.');
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $data->title = $request->title;
            $data->slug = Str::slug($request->title);
            $data->save();

            if($data){
                Session::flash('success','Data berhasil input, terima kasih.');
                return redirect()->route('admin.genre');
            }
        }
    }

}
