<?php
namespace App\views\components;

use Illuminate\View\Component;

class Task extends Component
{

    private $task;
    public function __construct($task)
    {
        $this->task = $task;
    }

    public function render()
    {
        