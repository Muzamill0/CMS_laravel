<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $users = count(User::all());

        $data = [
            'users' => $users,
            'vahicles' => count(Vehicle::all()),
        ];
        return view('dashboard', $data);
    }
}
