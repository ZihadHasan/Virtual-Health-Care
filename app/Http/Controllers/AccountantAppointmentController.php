<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Checkout;
use Auth;
use Session;

class AccountantAppointmentController extends Controller
{
    public function unverifiedList()
    {
      $appointments = Appointment::where('isConfirmed',1)
                                    ->where('isVerified',0)
                                    ->where('isPaid',1)
                                    ->get();

      return view('accountants.appointments.index')->with('user',Auth::user())->with('appointments',$appointments);
    }

    public function verifiedList()
    {
      $appointments = Appointment::where('isConfirmed',1)
                                    ->where('isVerified',1)
                                    ->where('isPaid',1)
                                    ->get();

      return view('accountants.appointments.verified')->with('user',Auth::user())->with('appointments',$appointments);
    }

    public function show($id)
    {
      $appointment = Appointment::find($id);

      return view('accountants.verify.index')->with('user',Auth::user())->with('appointment',$appointment);
    }

    public function verify($id)
    {
      $appointment = Appointment::find($id);
      $appointment->isVerified = 1;
      $appointment->save();

      Session::flash('success','Payment verified for this appointment');

      return redirect()->route('accountant.appointment.get',['id' => $appointment->id]);
    }

    public function recieption()
    {
      return view('accountants.recieption.index')->with('user',Auth::user())->with('find',0);
    }

    public function recieptionSubmit(Request $r)
    {
      $this->validate($r,[
        'id' => 'required'
      ]);

      $checkout = Checkout::find($r->id);
      if($checkout){
        $appointment = Appointment::find($checkout->appointment_id);
      } else{
        $appointment = 0;
      }

      return view('accountants.recieption.index')->with('user',Auth::user())->with('find',1)->with('appointment',$appointment)->with('query',$r->id);
    }
}
