<?php
namespace App\Models;
use App\Base\Models\BaseModel;
class Task extends BaseModel
{
    public $table = 'tasks';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'task_status_id'
    ];

    /**
     * Get model rules
     *
     * @return array
     */
	public function getRules()
    {
        return [
            'id' => 'required|unique:tasks',
            'name' => 'required',
            'task_status_id' => 'required'
        ];
    }

	/**
	 * Get all tasks status
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function taskstatus()
	{
		return $this->belongsTo('App\Model\TaskStatus');
	}
}