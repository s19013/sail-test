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

    function index(Request $request ) {
        $tasks = null;
        $attributes = $request->only(['keyword']);

        // 初期状態､keywordがからの時
        if (empty($attributes) || empty($attributes['keyword'])) {
            $tasks = $this->taskRepository->incompleteTask();
        }
        else {
            $tasks = $this->taskRepository->searchIncompleteTask($attributes);
        }

        return view('task.index')->with([
            'tasks' =>$tasks
        ]);

    }

    function create() {
        return view('task.create');
    }

    function store(CreateTaskRequest $request) {
        $attributes = $request->only(['task_name']);
        try {
            $this->taskRepository->store($attributes);
        } catch (\Throwable $th) {
            // 何かエラー発生したらログを残してエラーがおきたことを伝える
            return redirect()->back()->withErrors(['message' => 'エラーが発生しました｡時間を置いて再度送信して下さい｡'])->withInput();
        }

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
