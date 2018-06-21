@if (count($users) > 0)
<ul class="media-list">
@foreach ($users as $user)
    <li class="mrdia">
        <div class="media-left">
            <img class="mrdia-object img-rounded" src"{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $users->render() !!}
@endif