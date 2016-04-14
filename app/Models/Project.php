<?php

namespace App\Models;


use App\Base\Models\BaseModel;

class Project extends BaseModel
{
    /**
     * Defines model table
     *
     * @var string
     */
    public $table = 'projects';

    /**
     * Defines which attributes should be mass-assignable
     *
     * @var array
     */
    public $fillable = [
        'name', 'status'
    ];

    /**
     * Defines project rules
     *
     * @return array
     */
    public static function getRules()
    {
        return [
            'name' => 'required|max:100',
            'status' => 'required'
        ];
    }

    /**
     * Get phases's project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phases()
    {
        return $this->hasMany('App\Models\Phase');
    }
}