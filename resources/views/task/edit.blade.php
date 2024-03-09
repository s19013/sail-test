<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <x-errorMessage :message="$errors" />
    {{ Form::open(['method' => 'post', 'route' => ['task.update', 'id' => $task->id]]) }}
    {{ Form::token() }}
    {{ Form::textarea('task_name', old('task_name', $task->task_name), ['id' => 'lastName', 'placeholder' => 'タスク名', 'required' => 'required']) }}
    {{ Form::submit('送信') }}
    {{ Form::close() }}

    {{ Form::open(['method' => 'delete', 'route' => ['task.destroy', 'id' => $task->id]]) }}
    {{ Form::submit('削除') }}
    {{ Form::close() }}
</body>

</html>
