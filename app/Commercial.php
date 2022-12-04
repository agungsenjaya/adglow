<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commercial extends Model
{
    use SoftDeletes;
    
    protected $table = 'commercials';
    protected $guarded = ['commercials'];
    protected $dates = ['tgl_tayang'];
}
