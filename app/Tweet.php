<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table='tweets';
    public $timestamp=false;
    protected $primaryKey='id';
}
