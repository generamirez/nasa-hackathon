<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForeCast extends Model
{
    protected $fillable = ['date','temperature', 'precipitation'];
}
