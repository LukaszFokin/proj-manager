<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class User extends BaseModel
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];
}
