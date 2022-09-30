<?php

namespace Cms\Modules\TodoList\Repositories;

use Cms\Modules\Core\Models\TodoList;
use Cms\Modules\TodoList\Repositories\Contracts\TodoListRepositoryContract;

class TodoListRepository implements TodoListRepositoryContract
{
    protected $model;

    public function __construct(TodoList $todoList)
    {
        $this->model = $todoList;
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function getAll($id)
    {
        return $this->model->where('user_id', $id)->get()->toArray();
    }

    public function find($id)
    {
        return $this->model->where('id', $id)->get();
    }

    public function update($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }


}
