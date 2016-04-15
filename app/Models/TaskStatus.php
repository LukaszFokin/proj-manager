<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class TaskStatus extends BaseModel
{
    public $table = 'tasks_status';

    /**
     * Get all tasks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
