<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class ProjectLabel extends BaseModel
{
    public $table = 'project_labels';

    public $fillable = [
        'project_id',
        'name',
        'color'
    ];

    /**
     * Defines phases rules
     */
    public function getRules()
    {
        return [
            'name' => 'required|max:100',
            'color' => 'required',
        ];
    }

    /**
     * Get the project that owns the phase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }


    /**
     * Get phase activities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany('App\Models\Activity');
    }
}
