<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;
    
    protected $table = 'movies';
    protected $guarded = ['movies'];
    protected $dates = ['tgl_tayang'];
}
