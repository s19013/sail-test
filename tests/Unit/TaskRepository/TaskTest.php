<?php

namespace Tests\Unit\TaskRepository;

use Tests\TestCase;

use App\Models\Task;
use App\Http\Repository\TaskRepository;


// データベース関係で使う
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class TaskTest extends TestCase {
    // テストしたらリセットする
    use RefreshDatabase;

    private $taskRepository;

    function  setUp() :void {
        parent::setUp();
        $this->taskRepository =  new TaskRepository();
    }

    /** @test */
    function store() : void {
        $attributes = [
            "task_name" => "testTask"
        ];

        $this->taskRepository->store($attributes);

        $this->assertDatabaseHas('tasks',$attributes);
    }
}
