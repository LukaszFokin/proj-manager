<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Phase extends BaseModel
{
    public $table = 'phases';

    public $fillable = [
        'project_id',
        'parent_id',
        'name',
        'status'
    ];

    /**
     * Defines phases rules
     */
    public function getRules()
    {
        return [
            'name' => 'required|max:100',
            'project_id' => 'required',
            'status' => 'required'
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
     * Get parent phase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentPhase()
    {
        return $this->belongsTo('App\Models\Phase', 'parent_id');
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
