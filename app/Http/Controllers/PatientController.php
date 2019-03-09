<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use Session;
use File;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('admin');
     }

    public function index()
    {
        $patients = Patient::paginate(7);

        return view('admin.patients.index')->with('patients',$patients);
    }


    public function create()
    {

        return view('admin.patients.create');
    }


    public function store(Request $r)
    {

      $this->validate($r,[
        'name' => 'required',
        'email' => 'required',
        'password' => 'required|min:6',
      ]);

      $user = new User;
      $patient = new Patient;

      $user->name = $r->name;
      $user->email = $r->email;
      $user->password = bcrypt($r->password);
      $user->description = $r->description;
      $user->phone = $r->phone;
      $user->save();

      if($r->hasFile('avatar'))
      {
        $avatar = $r->avatar;
        $avatar_new_name = time().$avatar->getClientOriginalName();

        $avatar->move('uploads/avatars/patients',$avatar_new_name);

        $user->avatar = 'uploads/avatars/patients/' . $avatar_new_name;
        $user->save();
      }

      $patient->user_id = $user->id;
      $patient->save();

      $user->patient_id = $patient->id;
      $user->save();

      Session::flash('success','Patient Added Successfully');

      return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.patients.edit')->with('user',$user);
    }


    public function update(Request $r, $id)
    {
        $this->validate($r,[
          'name' => 'required',
          'email' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $r->name;
        $user->email = $r->email;
        $user->phone = $r->phone;
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

          $avatar->move('uploads/avatars/patients',$avatar_new_name);

          $user->avatar = 'uploads/avatars/patients/' . $avatar_new_name;
          $user->save();
        }


        Session::flash('success','Patient\'s details updated Successfully');

        return redirect()->route('admin.patient.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->patient->delete();

        if($user->avatar){
          $image_path = $user->avatar;
          if (File::exists($image_path)) {
             unlink($image_path);
         }
        }
        $user->delete();

        Session::flash('success','Patient Has Been Removed From List');

        return redirect()->route('admin.patient.index');
    }
}
