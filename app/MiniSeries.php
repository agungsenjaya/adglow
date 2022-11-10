<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MiniSeries extends Model
{
    use SoftDeletes;

    protected $table = 'miniseries';
    protected $guarded = ['miniseries'];
}
