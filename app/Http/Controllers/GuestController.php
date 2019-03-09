<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Doctor;
use App\User;

class GuestController extends Controller
{
    public function index()
    {
      $departments = Department::paginate(9);
      $doctors = Doctor::paginate(3);
      return view('welcome')->with('departments',$departments)->with('i',1)->with('doctors',$doctors);
    }

    public function list()
    {
      $doctors = Doctor::paginate(6);
      return view('list')->with('doctors',$doctors);
    }

    public function profile($id)
    {
      $doctor = Doctor::find($id);
      return view('profile')->with('doctor',$doctor);
    }

    public function patient($id)
    {
      $user = User::find($id);
      return view('patient')->with('user',$user);
    }
}
