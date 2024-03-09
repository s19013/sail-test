<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif

    <x-errorMessage :message="$errors" />
    {{ Form::open(['method' => 'get', 'route' => 'task.index']) }}
    {{ Form::text('keyword', old('keyword'), ['placeholder' => '検索']) }}
    {{ Form::submit('送信') }}
    {{ Form::close() }}

    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->task_name }}</li>
        @endforeach
    </ul>
</body>

</html>
