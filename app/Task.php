<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
	 protected $table = 'tasks';
    protected $primaryKey = 'task_id';

     public function subtasks()
    {
        return $this->hasMany('App\Subtask');
    }
}
