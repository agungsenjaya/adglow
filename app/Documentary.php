<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documentary extends Model
{
    use SoftDeletes;

    protected $table = 'documentaries';
    protected $guarded = ['documentaries'];
    protected $dates = ['tgl_tayang'];
}
