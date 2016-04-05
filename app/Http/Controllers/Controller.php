<?php

namespace App\Base\Controllers;

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
}
