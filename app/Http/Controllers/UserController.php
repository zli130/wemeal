<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Helpers\Strings;

use Hash;

use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('_manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('_manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users'
        ]);

        if ($request->has('password') && !empty($request->password)) {
            $password = $request->password;
        } else {
            $password = Strings::random(8);
        }

        $user = new User();

        $user->name = $request->name;

        $user->email = $request->email;

        $user->password = Hash::make($password);

        $user->active = $request->has('active') ? 1 : 0;

        if ($user->save()) {
            Session::flash('success', 'Great,you have successfully created an user!');
            return redirect()->route('users.show', $user->id);
        } else {
            Session::flash('danner', 'Sorry, a problem occurred while creating user!');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('_manage.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('_manage.users.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;

        $user->email = $request->email;

        if ($request->password_options == "auto") {
            $user->password = Hash::make(Strings::random(8));
        } elseif ($request->password_options == "manual" && $request->has('password') && !empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->active = $request->has('active') ? 1 : 0;

        if ($user->save()) {
            Session::flash('success', 'Great,you have successfully updated user account!');
            return redirect()->route('users.show', $user->id);
        } else {
            Session::flash('danner', 'Sorry, a problem occurred while updating user account!');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
