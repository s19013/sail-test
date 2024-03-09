<?php
namespace App\Http\Repository;
use Illuminate\Support\Facades\Log;
use App\Models\Task;

class TaskRepository{

    function store(Array $attributes) : bool {
        try {
            Task::create($attributes);
        } catch (\Throwable $th) {
            // 何かエラー発生したらログを残してfalseを返す
            Log::error($th);
            return false;
        }
        return true;
    }
}
