<?php

namespace Cms\Modules\Core\Models;

use Cms\Modules\Core\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    protected $table = 'todolists';
    protected $fillable = [
        'user_id',
        'content',
        'status',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
