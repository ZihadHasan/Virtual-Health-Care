<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Department;
use App\User;
use Session;
use File;

class DoctorController extends Controller
{

     public function __construct()
     {
         $this->middleware('admin');
     }


    public function index()
    {
        $doctors = Doctor::paginate(7);

        return view('admin.doctors.index')->with('doctors',$doctors);
    }


    public function create()
    {
        $departments = Department::orderBy('name','asc')->get();

        return view('admin.doctors.create')->with('departments',$departments);
    }


    public function store(Request $r)
    {

      $this->validate($r,[
        'name' => 'required',
        'email' => 'required',
        'password' => 'required|min:6',
        'department_id' => 'required',
        'bill' => 'required'
      ]);

      $user = new User;
      $doctor = new Doctor;

      $user->name = $r->name;
      $user->email = $r->email;
      $user->password = bcrypt($r->password);
      $user->description = $r->description;
      $user->isPatient = 0;
      $user->isDoctor = 1;
      $user->save();

      if($r->hasFile('avatar'))
      {
        $avatar = $r->avatar;
        $avatar_new_name = time().$avatar->getClientOriginalName();

        $avatar->move('uploads/avatars/doctors',$avatar_new_name);

        $user->avatar = 'uploads/avatars/doctors/' . $avatar_new_name;
        $user->save();
      }

      $doctor->user_id = $user->id;
      $doctor->department_id = $r->department_id;
      $doctor->title = $r->title;
      $doctor->bill = $r->bill;
      $doctor->save();

      $user->doctor_id = $doctor->id;
      $user->save();

      Session::flash('success','Doctor Added Successfully');

      return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::find($id);
        $departments = Department::orderBy('name','asc')->get();

        return view('admin.doctors.edit')->with('departments',$departments)->with('user',$user);
    }


    public function update(Request $r, $id)
    {
        $this->validate($r,[
          'department_id' => 'required',
          'name' => 'required',
          'email' => 'required',
          'bill' => 'required'
        ]);

        $user = User::find($id);

        $user->name = $r->name;
        $user->email = $r->email;
        $user->description = $r->description;
        $user->save();

        if($r->hasFile('avatar'))
        {
          if($user->avatar){
            $image_path = $user->avatar;
            if (File::exists($image_path)) {
               unlink($image_path);
           }
          }

          $avatar = $r->avatar;
          $avatar_new_name = time().$avatar->getClientOriginalName();

          $avatar->move('uploads/avatars/doctors',$avatar_new_name);

          $user->avatar = 'uploads/avatars/doctors/' . $avatar_new_name;
          $user->save();
        }

        $user->doctor->department_id = $r->department_id;
        $user->doctor->title = $r->title;
        $user->doctor->bill = $r->bill;
        $user->doctor->save();

        Session::flash('success','Doctor\'s details updated Successfully');

        return redirect()->route('admin.doctor.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->doctor->delete();

        if($user->avatar){
          $image_path = $user->avatar;
          if (File::exists($image_path)) {
             unlink($image_path);
         }
        }
        $user->delete();

        Session::flash('success','Doctor Has Been Removed From List');

        return redirect()->route('admin.doctor.index');
    }
}
