<?php


namespace Cms\Modules\TodoList\Services;


use Cms\Modules\TodoList\Repositories\Contracts\TodoListRepositoryContract;
use Cms\Modules\TodoList\Services\Contracts\TodoListServiceContract;

class TodoListService implements TodoListServiceContract
{
    protected $repository;

    public function __construct(TodoListRepositoryContract $todoListRepositoryContract)
    {
        $this->repository = $todoListRepositoryContract;
    }

    public function getAll($id)
    {
        return $this->repository->getAll($id);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

}
