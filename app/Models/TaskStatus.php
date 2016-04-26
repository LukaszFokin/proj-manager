<?php

namespace App\Models;
use App\Base\Models\BaseModel;

class TaskStatus extends BaseModel
{
    public $table = 'tasks_status';

    protected $fillable = ['name', 'project_id'];

    /**
     * Model rules
     *
     * @return array
     */
    public function getRules()
    {
        return [
            'name' => 'required|max:250',
            'project_id' => 'required'
        ];
    }

    /**
     * Get all tasks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\Task','task_status_id');
    }

    /**
     * Get task status project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}