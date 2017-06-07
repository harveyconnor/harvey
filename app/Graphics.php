<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graphics extends Model
{
    protected $table = 'gallery_graphics';
    protected $fillable = ['name','title','description','filename','user_id'];
}
