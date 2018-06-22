<ul class="media-list">
@foreach ($tasks as $task)
    <?php $user = $task->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $task->created_at }}</span>
            </div>
            <div>
                <p><span class="bg-info">Content</span><br>{!! nl2br(e($task->content)) !!}</p>
                <p><span class="bg-info">Status</span><br>{!! nl2br(e($task->status)) !!}</p>
            </div>
            <div>
                 @if (Auth::id() == $task->user_id)
                 <div class="btn-toolbar" role="toolbar">
                    {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                    
                    {!! link_to_route('tasks.edit','EDIT',['id'=>$task->id],['class'=>'btn btn-primary btn-xs']) !!}
                    {!! link_to_route('tasks.show','DETAIL',['id'=>$task->id],['class'=>'btn btn-default btn-xs']) !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $tasks->render() !!}