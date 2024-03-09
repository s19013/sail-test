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

        return view('task.index')->with([
            'tasks' => $this->taskRepository->incompleteTask()
        ]);
    }

    function create() {
        return view('task.create');
    }

    function store(CreateTaskRequest $request) {
        $attributes = $request->only(['task_name']);
        $status = $this->taskRepository->store($attributes);

        if ($status) {
            return redirect()->route('task.index')->with('message', '登録できました。');
        }

        // データベースでエラーがおきたことを伝える
        return redirect()->back()->withErrors(['message' => 'エラーが発生しました｡時間を置いて再度送信して下さい｡'])->withInput();

    }

    function edit() {
        return view('task.edit');
    }

    function update() {

    }

    function destroy() {

    }
}
