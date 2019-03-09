<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Patient;
use App\Doctor;
use App\User;
use App\Checkout;
use App\Department;
use Stripe\Stripe;
use Stripe\Charge;
use Session;
use Auth;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $appointments = Appointment::where('patient_id',Auth::user()->patient_id)->get();

        $now = Carbon::parse(Carbon::now())->format('i');

        return view('patients.appointments.index')->with('appointments',$appointments)->with('user',User::find(Auth::id()))->with('now',$now);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $doctor = Doctor::find($id);

      return view('patients.appointments.create')->with('doctor',$doctor)->with('user',Auth::user());
    }

    public function generateRandomString($length) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
      }

    public function store(Request $r)
    {
        $this->validate($r,[
          'doctor_id' => 'required',
          'date' => 'required'
        ]);

        $app = new Appointment;
        $app->patient_id = Auth::user()->patient_id;
        $app->doctor_id = $r->doctor_id;
        $app->date = $r->date;
        $app->sendDoctor = 0;
        if($app->save()){
          Session::flash('success','Your Request For Appointment with '.$app->doctor->user->name.' has been sent !! Wait for approval');
        }

        return redirect()->route('patient.appointment.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $app = Appointment::find($id);


      return view('patients.appointments.edit')->with('appointment',$app)->with('user',Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
      $this->validate($r,[
        'date' => 'required'
      ]);

      $app = Appointment::find($id);
      $app->date = $r->date;
      if($app->save()){
        Session::flash('success','The Appointment with '. $app->doctor->user->name . ' has been updated!!');
      }

      return redirect()->route('patient.appointment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Appointment::destroy($id)){
          Session::flash('success','This Appointment has been deleted!!');
        }

        return redirect()->back();
    }

    public function getDoctors(){
      $departments = Department::orderBy('name','asc')->get();
      return view('patients.doctors.index')->with('departments',$departments)->with('find',0)->with('user',Auth::user());
    }

    public function getResults(Request $r){
      $result = Department::find($r->department_id);
      $doctors = Doctor::where('department_id',$result->id)->get();
      $departments = Department::orderBy('name','asc')->get();

      return view('patients.doctors.index')->with('result',$result)->with('departments',$departments)->with('find',1)->with('user',Auth::user())->with('doctors',$doctors);
    }


    public function pay($id){
      $appointment = Appointment::find($id);
      return view('patients.appointments.pay')->with('appointment',$appointment)->with('proceed',0)->with('user',Auth::user());
    }

    public function proceed($id){
      $appointment = Appointment::find($id);

      return view('patients.appointments.pay')->with('appointment',$appointment)->with('proceed',1)->with('user',Auth::user());
    }

    public function checkout(Request $r, $id){

      $appointment = Appointment::find($id);

      Stripe::setApiKey('sk_test_4azA1vuEPMOMNYpK4mfnKT9N');
      Charge::create([
        'amount' => $appointment->doctor->bill * 100,
        'currency' => 'usd',
        'source' => $r->stripeToken,
      ]);

      $appointment->isPaid = 1;
      $appointment->save();

      $checkout = new Checkout;
      $checkout->user_id = Auth::id();
      $checkout->appointment_id = $appointment->id;
      $checkout->identity = $this->generateRandomString(6).''.rand(0,100000);
      $checkout->save();


      Session::flash('success','Your Payment Has Been Recieved Successfully wait for the confirmation from Accountant');

      return redirect()->route('patient.appointment.index');

    }

    public function details($id)
    {
      $appointment = Appointment::find($id);
      $paid = $appointment->isPaid;

      return view('patients.appointments.pay')->with('appointment',$appointment)->with('proceed',3)->with('user',Auth::user())->with('paid',$paid);
    }

    public function patientList($id)
    {
      $appointments = Appointment::where('isPaid',1)->where('isVerified',1)->where('doctor_id',$id)->paginate(10);
      return view('doctors.patients.index')->with('appointments',$appointments)->with('user',Auth::user());
    }
}
