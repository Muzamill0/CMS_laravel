<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'attendances' => Attendance::with('employee')->paginate(15),
        ];

        return view('attendances.index', $data);
    }

    public function fetch_attendance(Request $request)
    {
        // dd($request->all());
        $data = [
            'attendances' => Attendance::with('employee')->where('date', $request->date)->paginate(15),
        ];
        return view('attendances.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'employees' => Employee::with('user')->get()
        ];
        return view('attendances.create',$data);
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
            'date' => [
                'required',
                Rule::unique('attendances')->where(fn ($query) => $query->where([
                    ['date', $request->date],
                ]))
            ],
        ], [
            'date.unique' => 'Attendance for this date is already taken'
        ]);

        $employees = $request->except('_token','date');
            $count = 0;
            foreach ($employees as $key => $value) {
                $data = [
                    'employee_id' => $key,
                    'date' => $request->date,
                    'status' => $value,
                ];
                if (Attendance::create($data)) {
                    $count++;
                }
            }

            if ($count == count($employees)) {
                return back()->with('success', 'Attendance has been successfully added!');
            } else {
                return back()->with('error', 'Attendance details has failed to add!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
