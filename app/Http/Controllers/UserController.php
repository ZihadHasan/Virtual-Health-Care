<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Doctor;
use App\Patient;
use Session;
use Auth;
use File;

class UserController extends Controller
{
    public function edit()
    {
      $user = User::find(Auth::id());
      $departments = Department::orderBy('name','asc')->get();

      return view('patients.profile')->with('user',$user)->with('departments',$departments);
    }



    public function store(Request $r)
    {

      $this->validate($r,[
        'name' => 'required',
        'email' => 'required',
        'password' => 'required|min:6|confirmed',
      ]);

      $user = new User;
      $patient = new Patient;

      $user->name = $r->name;
      $user->email = $r->email;
      $user->password = bcrypt($r->password);
      $user->save();

      $patient->user_id = $user->id;
      $patient->save();

      $user->patient_id = $patient->id;
      $user->save();

      Session::flash('success','Registration Successfully');

      return redirect()->route('home');
    }

    public function picture(Request $r){

      $user = User::find(Auth::id());

      if($user->avatar){
        $image_path = $user->avatar;
        if (File::exists($image_path)) {
           unlink($image_path);
       }
      }

      $avatar = $r->avatar;
      $avatar_new_name = time().$avatar->getClientOriginalName();

      if($user->isPatient){
        $avatar->move('uploads/avatars/patients',$avatar_new_name);
        $user->avatar = 'uploads/avatars/patients/' . $avatar_new_name;
      }
      elseif($user->isDoctor){
        $avatar->move('uploads/avatars/doctors',$avatar_new_name);
        $user->avatar = 'uploads/avatars/doctors/' . $avatar_new_name;
      }
      elseif($user->isAccountant){
        $avatar->move('uploads/avatars/accountants',$avatar_new_name);
        $user->avatar = 'uploads/avatars/accountants/' . $avatar_new_name;
      }
      if ($user->save()){
        Session::flash('success','Your Picture Updated Successfully');
      }else {
        Session::flash('info','Something Went Wrong');
      }

      return redirect()->back();
    }


    public function specialities(Request $r){
      $this->validate($r,[
        'department_id' => 'required'
      ]);

      $d = Doctor::find(Auth::user()->doctor_id);
      $d->department_id = $r->department_id;
      $d->title = $r->title;
      $d->save();

      Session::flash('success','Your Specilities Has Been Updated Successfully');

      return redirect()->back();
    }



    public function information(Request $r){

      $this->validate($r,[
        'name' => 'required',
      ]);

      $user = User::find(Auth::id());
      $user->name = $r->name;
      $user->gender = $r->gender;
      $user->age = $r->age;
      $user->phone = $r->phone;
      $user->save();
      Session::flash('success','Your Informations Has been Updated');


      return redirect()->back();
    }

    public function address(Request $r){
      $this->validate($r,[
        'description' => 'required',
      ]);
      $user = User::find(Auth::id());
      $user->description = $r->description;
      $user->save();

      if($user->isPatient){
        Session::flash('success','Your Address has been updated successfully');
      }elseif ($user->isDoctor) {
        Session::flash('success','Your Objectives has been updated successfully');
      }

      return redirect()->back();

    }

    public function password(Request $r){
        $this->validate($r,[
        'password' => 'required|min:6|confirmed'
      ]);

        $user = User::find(Auth::id());
        $user->password = bcrypt($r->password);
        $user->save();
        Session::flash('success','Your Password Has Been Updated');
        return redirect()->back();
      }
}
