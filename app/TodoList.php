<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $fillable = ['name'];

    public function todo_lists()
    {
        return $this->hasMany(Todo::class);
    }
}
