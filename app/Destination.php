<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = ['id', 'name', 'user_id', 'visited', 'number'];
}
