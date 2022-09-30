@foreach($todos as $todo)
    <div class="todo-item {{$todo['status'] ? "done-todo" : ""}}">
        {{$todo['content']}}
        <a href="#">
            <button data-id="{{$todo['id']}}" class="btn-style btn-del">
                Xóa
            </button>
        </a>
        <a href="{{route('todolist-edit', ['user_id' => $user[0]['id'], 'id' => $todo['id']])}}">
            <button class="btn-style btn-fix">
                Sửa
            </button>
        </a>
    </div>
@endforeach
