<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Repository\TaskRepository;
use App\Http\Requests\CreateTaskRequest;

class TaskController extends Controller
{
    public function __construct(){
        $this->taskRepository = new TaskRepository();
    }

    function index() {
        return view('task.index');
    }

    function create() {
        return view('task.create');
    }

    function store(CreateTaskRequest $request) {
        $attributes = $request->only(['task_name']);
        $this->taskRepository->store($attributes);
        return redirect()->route('task.index')->with('message', '登録できました。');
    }

    function edit() {
        return view('task.edit');
    }

    function update() {

    }

    function destroy() {

    }
}
