<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Photo;
use App\Role;
use App\User;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index()
    {
        $users = User::paginate(20);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = $request->all();
        $user = Photo::hasPhoto($user,$request);
        User::create($user);
        $request->session()->flash('created_user', 'The user has been created');
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        if (trim($request->password == '')) {
            $input = $request->except('password');
        } else {
            $request->validate([
                'password' => 'string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
            ]);
            $input = $request->all();
        }
        $user = Photo::hasPhoto($user,$request);
        $input['photo_id'] = $user->photo_id;
        $user->update($input);
        $request->session()->flash('updated_user', 'The user has been updated');
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->photo) {
            unlink(public_path() . '/' . $user->photo->path);
        }
        $user->delete();
        session()->flash('deleted_user', 'The user has been deleted');
        return redirect('/users');
    }
}
