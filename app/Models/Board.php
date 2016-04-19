<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Board extends BaseModel
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'boards';

    /**
    * Get all tasks
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function tasks()
    {
        return $this->hasOne('App\Models\Task');
    }


    

}
