@extends('layouts.app')

@section('content')

    <div class="row">
        <aside class="col-sm-4">
            {{--ユーザー情報--}}
            @include('users.card')
        </aside>
        <div class="col-sm-8">
            {{--タブ--}}
            @include('users.navtabs')
            {{--ファボ一覧--}}
            @if(count($favorites) > 0 )
                <ul class="list-unstyled">
                    @foreach($favorites as $favorites)
                        <li class="media mb-3">
                            <img class="mr-2 rounded" src="{{ Gravatar::get($favorites->user->email, ['size' => 50]) }}" alt="">
                            <div class="media-body">
                                <div>
                                    {!! link_to_route('users.show',$favorites->user->name,['user' => $favorites->user->id]) !!}
                                    <span class="text-muted">posted_at {{ $favorites->created_at }}</span>
                                </div>
                                <div>
                                    <p class="mb-0">{!! nl2br(e($favorites->content)) !!}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

@endsection