@extends('Core::layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List user</div>
                    <div class="card-body">
                        <div class="wrapper">
                            @if($users)
                                @foreach($users as $user)
                                    <div class="todo-item">
                                        {{$user['name']}}
                                        <a href="{{route('todolist', ['user_id' => $user['id']])}}">
                                            <button class="btn-style btn-del">
                                                Xem
                                            </button>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                Không có thành viên nào!
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

