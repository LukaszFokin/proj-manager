<?php
/**
 * Created by PhpStorm.
 * User: padrao
 * Date: 12/04/2016
 * Time: 13:42
 */

namespace App\Models;


use App\Base\Models\BaseModel;

class Project extends BaseModel
{
    public $table = 'projects';

    public $fillable = [
        'name', 'status'
    ];

    public static function getRules()
    {
        return [
            'name' => 'required|max:100',
            'status' => 'required'
        ];
    }
}