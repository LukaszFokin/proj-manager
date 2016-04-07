<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /**
     * Var to define if access to controller is restricted by authenticated user
     *
     * @var bool
     */
    protected $restricted = true;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if($this->restricted)
            $this->middleware('auth');
    }

    protected function addInfoMessage($message)
    {
        \Session::flash('alert-info', $message);
    }

    protected function addErrorMessage($message)
    {
        \Session::flash('alert-danger', $message);
    }

    protected function addWarningMessage($message)
    {
        \Session::flash('alert-warning', $message);
    }

    protected function addSuccessMessage($message)
    {
        \Session::flash('alert-success', $message);
    }
}
