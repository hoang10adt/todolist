<?php

namespace Cms\Modules\TodoList;

use Cms\CmsServiceProvider;
use Illuminate\Routing\Router;
use Cms\Modules\TodoList\Services\Contracts\TodoListServiceContract;
use Cms\Modules\TodoList\Services\TodoListService;
use Cms\Modules\TodoList\Repositories\Contracts\TodoListRepositoryContract;
use Cms\Modules\TodoList\Repositories\TodoListRepository;

class TodoListServiceProvider extends CmsServiceProvider
{
    public function boot(Router $router)
    {
        parent::boot($router);
    }
	public function register()
	{	    
        $this->app->bind(TodoListServiceContract::class, TodoListService::class);
        $this->app->bind(TodoListRepositoryContract::class, TodoListRepository::class);
	}
}