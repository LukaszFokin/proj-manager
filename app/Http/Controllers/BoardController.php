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

}
