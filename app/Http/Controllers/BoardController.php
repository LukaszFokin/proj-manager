<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Board;
use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Http\Request;
use App\Http\Requests;

class BoardController extends Controller
{
	private $board;
    private $task_status;

    public function __construct()
    {
        parent::__construct();
        $this->board = new Board();
        $this->task_status = new TaskStatus();
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {   
        return view('boards.home',['task_status'=>$this->task_status->all()]);
    }


    public function changestatus(Request $request)
    {
        if($request->ajax())
        {
            //atualiza status da Tarefa
            $id = $request->input('task_id');
            $status= $request->input('task_new_status');
            $task = Task::where('id', $id)->update(['task_status_id'=>$status]);
        }
    }
}
