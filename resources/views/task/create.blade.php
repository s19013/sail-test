<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{ Form::open(['method' => 'post', 'route' => 'task.store']) }}
    {{ Form::token() }}
    {{ Form::textarea('task_name', old('task_name'), ['id' => 'lastName', 'placeholder' => 'タスク名', 'required' => 'required']) }}
    {{ Form::submit('送信') }}
    {{ Form::close() }}
</body>

</html>
