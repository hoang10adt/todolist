<?php
use Illuminate\Support\Facades\Route;
Route::group([
    'middleware' => 'web',
], function() {
    Route::group([
        'namespace' => 'Cms\Modules\TodoList\Controllers',
        'middleware' => [],
    ], function () {
        Route::group([
            'middleware' => ['auth', 'cms.verified', 'cms.checkadmin']
        ], function () {
            Route::get('todolist/{user_id}', 'TodoListController@index')->name('todolist');
            Route::post('todolist/{user_id}/create','TodoListController@create' )->name('todolist-create');
            Route::get('todolist/{user_id}/delete/todo','TodoListController@delete');
            Route::get('todolist/{user_id}/edit/{id}', 'TodoListController@edit')->name('todolist-edit');
            Route::post('todolist/{user_id}/edit/{id}', 'TodoListController@update')->name('todolist-edit');
            Route::get('todolist/admin/dashboard', 'TodoListController@admin')->name('todolist-admin');
        });
    });
});
?>
