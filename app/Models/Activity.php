<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Activity extends BaseModel
{
    /**
     * Model table
     *
     * @var string
     */
    public $table = "activities";

    /**
     * @var array
     */
    public $fillable = [
        'name', 'phase_id', 'order'
    ];

    /**
     * Get phase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function phase()
    {
        return $this->belongsTo('App\Models\Phase');
    }
}
