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

    /** @test */
    function incompleteTask() : void {
        $this->taskRepository->store([
            "task_name" => "not Delete"
        ]);

        $deleteTask = $this->taskRepository->store([
            "task_name" => "delete"
        ]);

        $deleteTask->delete();

        $tasks = $this->taskRepository->incompleteTask();

        $this->assertEquals($tasks[0]->task_name,'not Delete');

    }

    /** @test */
    function searchIncompleteTask_単語1つ() : void {

        $testcase = ['apple pie', 'apple tea','beryy pie'];

        foreach ($testcase as  $value) {
            $this->taskRepository->store([
                "task_name" => $value
            ]);
        }

        $tasks = $this->taskRepository->searchIncompleteTask([
            'keyword' => 'apple'
        ]);

        $this->assertEquals(count($tasks),2);
    }

    /** @test */
    function searchIncompleteTask_単語複数() : void {

        $testcase = ['apple pie', 'apple tea','beryy pie'];

        foreach ($testcase as  $value) {
            $this->taskRepository->store([
                "task_name" => $value
            ]);
        }

        $tasks = $this->taskRepository->searchIncompleteTask([
            'keyword' => 'apple pie'
        ]);

        $this->assertEquals(count($tasks),1);
    }

}
