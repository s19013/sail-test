<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    function index() {
        return view('task.index');
    }

    function create() {
        return view('task.create');
    }

    function store() {

    }

    function edit() {
        return view('task.edit');
    }

    function update() {

    }

    function destroy() {

    }
}
