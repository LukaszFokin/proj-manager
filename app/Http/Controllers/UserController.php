<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.home', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if(isDeleted($user->status)) {
            $this->addWarningMessage('Deleted users cannot be updated');

            return redirect('/users');
        }

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   Request $request
     * @param   int  $id
     *
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        $model = new User();
        $data = $request->input();

        $this->validate($request, $model->getRules($id));

        $user = $model->find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->status = $data['status'];
        $user->password = $data['password']? bcrypt($data['password']) : $user->password;
        $user->update();

        $this->addSuccessMessage('User updated successfully');

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
