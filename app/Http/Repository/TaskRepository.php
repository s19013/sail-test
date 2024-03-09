<?php
namespace App\Http\Repository;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Task;


class TaskRepository{

    function store(Array $attributes) {
        Task::create($attributes);
    }

    function incompleteTask() : Collection {
        return Task::where('deleted_at', null)->get();
    }
}
