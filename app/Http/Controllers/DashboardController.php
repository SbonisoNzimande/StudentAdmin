<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Student;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_total = Student::count();
        $user_total = User::count();
        return view('dashboard', ['student_total' => $student_total, 'user_total' => $user_total]);
    }
}
