<div>
    <p>{{ $task->task_name }}</p>
    <a href="{{ route('task.edit', ['id' => $task->id]) }}"><button>edit</button></a>
    {{ Form::open(['method' => 'delete', 'route' => ['task.done', 'id' => $task->id]]) }}
    {{ Form::submit('完了') }}
    {{ Form::close() }}

</div>
