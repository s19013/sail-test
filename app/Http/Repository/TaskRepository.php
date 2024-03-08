<?php
namespace App\Http\Repository;
use App\Models\Task;

class TaskRepository{

    function store(Array $attributes) : void {
        Task::create($attributes);
    }
}
