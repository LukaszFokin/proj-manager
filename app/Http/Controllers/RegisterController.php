<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;

/**
 * Class RegisterController
 * @package App\Http\Controllers
 *
 * @author Lukasz Fokin <lukasz.fokin@gmail.com>
 */
class RegisterController extends Controller
{
    public function index()
    {
        return view('register.form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|unique:users|max:120',
            'password' => 'required|max:40|confirmed'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Crypt::encrypt($request->input('password'));

        if($user->save())
            $request->session()->flash('alert-success', 'User created successfully');

        return redirect('/register');
    }
}
