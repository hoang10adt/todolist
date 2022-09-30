@extends('Core::layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <p style="color: red">{{session()->get('message')}}</p>
                        @endif
                        @if($user)
                            <div class="wrapper">
                                <header id="user-id" class="header-container" data-user_id="{{$user[0]['id']}}">
                                    <h1 class="header-title">{{$user[0]['name']}}</h1>
                                </header>
                                @if ($errors->has('content'))
                                    <p style="color:red;">{{$errors->first('content')}}</p>
                                @endif
                                <form method="post" class="form-container"
                                      action="{{route('todolist-create', ['user_id' => $user[0]['id']])}}">
                                    <input
                                        type="text"
                                        placeholder="Add Todo..."
                                        name="content"
                                        class="input-text"
                                    />
                                    <input type="submit" value="Submit" class="input-submit"/>
                                    @csrf
                                </form>

                                <div class="todos-wrapper">
                                    @include('TodoList::components/todos_component')
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        todoDelete = (e) => {
            e.preventDefault();
            let id = $(e.target).data("id");
            let user_id = $('#user-id').data('user_id');
            let url="/todolist/"+user_id+"/delete/todo";
            // console.log(id, user_id, url);

            $.ajax({
                type: "GET",
                url: url,
                data: {
                    id: id,
                    user_id: user_id
                },
                success: function(data) {
                    if (data.code == 200) {
                        console.log(data)
                        $('.todos-wrapper').html(data.list_todos);
                        alert('Xóa thành công');
                    }

                },
                error: function() {}
            });
         }

        $(function() {
            $('.btn-del').on('click', todoDelete);
        })
    </script>
@endsection

