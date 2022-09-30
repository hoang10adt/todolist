<?php
namespace Cms\Modules\TodoList\Services\Contracts;


interface TodoListServiceContract
{
public function getAll($id);

public function find($id);

public function store($data);

public function update($id, $data);

public function delete($id);


}
?>
