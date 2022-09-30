<?php
namespace Cms\Modules\TodoList\Repositories\Contracts;

interface TodoListRepositoryContract
{
    public function store($data);

    public function getAll($id);

    public function find($id);

    public function update($id, $data);

    public function delete($id);

}
?>
