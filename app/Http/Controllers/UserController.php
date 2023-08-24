<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'users' => User::paginate(20),
        ];

        // dd($data);
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'roles' => Role::all(),
        ];
        return view('users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'contact' => 'required|unique:users,contact_no' ,
            'cnic' => 'required|unique:users,cnic',
            'dob' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->passsword),
            'contact_no' => $request->contact,
            'cnic' => $request->cnic,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'status' => 1,
        ];
        $user_created = User::create($data)->assignRole($request->role);

        if($user_created){
            return back()->with('success', 'User has been created');
        } else{
            return back()->with('success', 'User has failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data = [
            'user' => $user,
            'roles' => Role::all(),
        ];
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id . ',id',
            'contact' => 'required|unique:users,contact_no,' . $user->id . ',id' ,
            'cnic' => 'required|unique:users,cnic,' . $user->id . ',id',
            'dob' => 'required',
        ]);

        if($request->password){
            $password = Hash::make($request->password);
        } else{
            $password = $user->password;
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'contact_no' => $request->contact,
            'cnic' => $request->cnic,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'status' => $request->status,
        ];

        $user_updated = User::find($user->id)->update($data);

        if($user_updated){
            User::find($user->id)->removeRole($user->roles->first());
            User::find($user->id)->assignRole($request->role);
            return back()->with('success', 'User has been Updated');
        } else{
            return back()->with('success', 'User has failed to update');
        }

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
