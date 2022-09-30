<?php

namespace Cms\Modules\Auth\Repositories;

use Cms\Modules\Auth\Repositories\Contracts\AuthUserRepositoryContract;
use Cms\Modules\Core\Models\User;
use Cms\Modules\Core\Repositories\CoreUserRepository;

class AuthUserRepository extends CoreUserRepository implements AuthUserRepositoryContract
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getUser($id)
    {
        return $this->model->where('id', $id)->with('roles')->get()->toArray();
    }

    public function getAllUsers()
    {
        return $this->model->all();
    }
}
