<?php
namespace App\Models;
use App\Base\Models\BaseModel;
class Task extends BaseModel
{
    public $table = 'tasks';
    

	public function taskstatus()
	{
		return $this->belongsTo('App\Model\TaskStatus');
	}
}