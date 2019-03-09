<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Doctor;
use Auth;
use Session;

class AdminAppointmentController extends Controller
{
    public function index()
    {
      $appointments = Appointment::orderBy('id','asc')->paginate(7);

      return view('admin.appointments.index')->with('appointments',$appointments);
    }

    public function doctorIndex()
    {
      $appointments = Appointment::where('doctor_id',Auth::user()->doctor_id)
                                   ->where('sendDoctor',1)
                                   ->where('isConfirmed',0)
                                   ->where('confirmedDoctor',0)
                                   ->where('isRejected',0)->get();

      return view('doctors.appointments.index')->with('user',Auth::user())->with('appointments',$appointments);
    }

    public function doctorView($id)
    {
      $app = Appointment::find($id);

      return view('doctors.appointments.view')->with('user',Auth::user())->with('app',$app);
    }

    public function confirm(Request $r, $id)
    {
      $app = Appointment::find($id);
      $app->time = $r->time;
      $app->confirmedDoctor = 1;
      $app->save();

      Session::flash('success','Appointment Have Been Confirmed Successfully');
      return redirect()->route('doctor.appointment.index');

    }

    public function sent($id)
    {
      $a = Appointment::find($id);
      $a->sendDoctor = 1;
      $a->save();

      Session::flash('success','Appointment Has Been Sent to doctor for review');

      return redirect()->back();
    }

    public function doctorAccept($id)
    {
      $a = Appointment::find($id);
      $a->confirmedDoctor = 1;
      $a->save();

      Session::flash('success','Appointment for '.$a->patient->user->name.' has been accepted');

      return redirect()->back();
    }

    public function doctorReject($id)
    {
      $a = Appointment::find($id);
      $a->isRejected = 1;
      $a->save();

      Session::flash('info','Appointment for '.$a->patient->user->name.' has been rejected');

      return redirect()->back();
    }


    public function adminAccept($id)
    {
      $a = Appointment::find($id);
      $a->confirmedAdmin = 1;
      $a->isConfirmed = 1;
      $a->save();

      Session::flash('success','Appointment for '.$a->patient->user->name.' has been confirmed');

      return redirect()->back();
    }

    public function adminReject($id)
    {
      $a = Appointment::find($id);
      $a->isRejected = 1;
      $a->save();

      Session::flash('info','Appointment for '.$a->patient->user->name.' has been rejected');

      return redirect()->back();
    }


}
