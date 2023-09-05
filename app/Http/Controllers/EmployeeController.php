<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'employees' => Employee::with('user', 'designation')->paginate(15),
        ];

        return view('employee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'designations' => Designation::where('status', 1)->get(),
        ];
        return view('employee.create', $data);
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
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required | unique:users,email',
            'password' => 'required | unique:users,email',
            'contact_no' => 'required | unique:users,email',
            'cnic' => 'required',
            'joining_date' => 'required',
            'salary' => 'required',
        ]);

        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->passsword),
            'contact_no' => $request->contact_no,
            'cnic' => $request->cnic,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'status' => 1,
        ];

        $user_created = User::create($user_data)->assignRole('Employee');

        if ($user_created) {
            $file = $request->image;

            if ($file) {
                $image_name = 'image' . time() . '-' . $file->getClientOriginalName();
            } else {
                $image_name = 'default.png';
            }

            $employee_data = [
                'user_id' => $user_created->id,
                'designation_id' => $request->designation,
                'joining_date' => $request->joining_date,
                'father_name' => $request->father_name,
                'relationship_status' => $request->relationship_status,
                'qualification' => $request->qualification,
                'image' => $image_name,
                'salary' => $request->salary,
            ];

            $employee_created = Employee::create($employee_data);

            if ($employee_created) {
                if($file){
                    $file->move_uploaded_file(public_path('images'), $image_name);
                }
                return back()->with('success', 'Employee has been created');
            } else {
                return back()->with('error', 'Employee has failed to create');
            }
        } else {
            return back()->with('error', 'User has failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $data = [
            'employee' => $employee
        ];
        return view('employee.show', $data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $data = [
            'designations' => Designation::where('status' , 1)->get(),
            'employee' => $employee,
        ];
        return view('employee.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required | unique:users,email,' . $employee->user_id . ',id',
            'cnic' => 'required | unique:users,cnic,' . $employee->user_id . ',id',
            'contact_no' => 'required | unique:users,contact_no,' . $employee->user_id . ',id',
            'joining_date' => 'required',
            'salary' => 'required',
        ]);

        if($request->passsword){
            $password = Hash::make($request->passsword);
        } else {
            $password = $employee->user->password;
        }

        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'contact_no' => $request->contact_no,
            'cnic' => $request->cnic,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'status' => $request->status,
        ];

        $user_updated = User::find($employee->user_id)->update($user_data);

        if ($user_updated) {

            if ($request->image) {
                $image_name = 'image' . time() . '-' . $request->image->getClientOriginalName();
            } else {
                $image_name = 'default.png';
            }

            $employee_data = [
                'user_id' => $employee->user_id,
                'designation_id' => $request->designation,
                'joining_date' => $request->joining_date,
                'father_name' => $request->father_name,
                'relationship_status' => $request->relationship_status,
                'qualification' => $request->qualification,
                'image' => $image_name,
                'salary' => $request->salary,
            ];

            $employee_updated = Employee::find($employee->id)->update($employee_data);

            if ($employee_updated) {
                if($request->image){
                    $request->image->move(public_path('images'), $image_name);
                }
                return back()->with('success', 'Employee has been updated');
            } else {
                return back()->with('error', 'Employee has failed to update');
            }
        } else {
            return back()->with('error', 'User has failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
