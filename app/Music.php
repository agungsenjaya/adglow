<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Music extends Model
{
    use SoftDeletes;

    protected $table = 'music';
    protected $guarded = ['music'];
    protected $dates = ['tgl_tayang'];
}
