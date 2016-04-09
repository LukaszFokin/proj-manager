<?php

namespace App\Http\Controllers;

use DB;
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
    public function index(Request $request)
    {
        $users = DB::table('users');

        // Check search
        if($search = $request->input('search')) {
            $users->where(function($query) use (&$search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%');
            });
        }

        // Check status
        if($status = $request->input('status'))
        {
            $users->where('status', '=', $status);
        }

        return view('users.home', ['users' => $users->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.form', ['user' => new User()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $this->validate($request, $user->getRules());

        $data = $request->input();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->status = ACTIVATED;
        $user->image = $this->upload($request);
        $user->save();

        $this->addSuccessMessage('User created successfully');

        return redirect('users');
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

        return view('users.form', ['user' => $user]);
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
        $user->image = $this->upload($request, $user->image);
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
        $user = User::find($id)->update(['status' => DELETED]);

        $this->addSuccessMessage('User deleted successfully');

        return redirect('/users');
    }

    protected function upload(Request $request, $deleteImage = null)
    {
        $image = $deleteImage;

        if($request->hasFile('image')) {
            $directoryPath = public_path('img/users');

            // Delete old image
            \File::delete("{$directoryPath}/{$deleteImage}");

            $file = $request->file('image');

            $image = md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();

            $file->move($directoryPath, $image);

            \Image::make("{$directoryPath}/{$image}")->fit(300, 300, function($constraint) {
                $constraint->aspectRatio();
            })->save();
        }

        return $image;
    }
}
