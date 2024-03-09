<?php
namespace App\Http\Repository;
use App\Models\Task;

class TaskRepository{

    function store(Array $attributes) : bool {
        try {
            Task::create($attributes);
        } catch (\Throwable $th) {
            // 何かエラーが置きたらfalseを返す
            return false;
        }
        return true;
    }
}
