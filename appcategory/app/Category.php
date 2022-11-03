<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'is_publish', 'created_at', 'updated_at'
    ];
}
