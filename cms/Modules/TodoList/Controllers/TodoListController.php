<?php

namespace Cms\Modules\TodoList\Controllers;

use App\Http\Controllers\Controller;
use Cms\Modules\Auth\Services\Contracts\AuthUserServiceContract;
use Cms\Modules\Core\Models\TodoList;
use Illuminate\Http\Request;
use Cms\Modules\TodoList\Services\Contracts\TodoListServiceContract;
use Cms\Modules\TodoList\Requests\TodoListRequest;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    protected $todoService;
    protected $userService;

    public function __construct(TodoListServiceContract $todoListServiceContract, AuthUserServiceContract $authUserServiceContract)
    {
        $this->todoService = $todoListServiceContract;
        $this->userService = $authUserServiceContract;
        $this->middleware('auth');
    }

    public function index(Request $request, $user_id)
    {
        $user = $this->userService->getUser($user_id);
        $todos = $this->todoService->getAll($user_id);
        return view('TodoList::todolist_show', ['todos' => $todos, 'user' => $user]);
    }

    public function create(TodoListRequest $todoListRequest, $user_id)
    {
       $data['content'] = $todoListRequest->input('content');
       $data['user_id'] = $user_id;
       $data['status'] = 0;
       $this->todoService->store($data);
       return redirect()->back();
       session()->flash('message','Thêm hoạt động thành công!');
    }

    public function delete(Request $request){
        if($request->id && $request->user_id){
            $this->todoService->delete($request->id);
            $todos = $this->todoService->getAll($request->user_id);
            $user = $this->userService->getUser($request->user_id);
            $list_todos = view('TodoList::components/todos_component',['todos'=>$todos, 'user' => $user])->render();
            return response()->json(['list_todos' => $list_todos,'code' => 200], 200);
        }
    }

    public function edit($user_id,$id){
        $todo = $this->todoService->find($id)->toArray();
        return view('TodoList::todolist_update', ['todo' => $todo]);
    }

    public function update(TodoListRequest $todoListRequest,$user_id, $id){
        if($todoListRequest->status == "true") {
            $status = true;
        } else {
            $status = false;
        }
        $data['content'] = $todoListRequest->input('content');
        $data['user_id'] = $user_id;
        $data['status'] = $status;
        $this->todoService->update($id, $data);
        return redirect(route('todolist', ['user_id' => $user_id]));
        session()->flash('message','Sửa hoạt động thành công!');
    }

    public function admin(){
        $users = $this->userService->getAllUsers()->toArray();
        return view('TodoList::todolist_admin',['users' => $users]);
    }
}


