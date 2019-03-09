<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Prescription;
use App\Doctor;
use App\User;
use Auth;
use Session;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $prescriptions = Prescription::where('patient_id',$id)->paginate(15);
      return view('prescription.index')->with('prescriptions',$prescriptions)->with('user',User::find(Auth::id()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $patient = Patient::find($id);
        return view('prescription.create')->with('patient',$patient)->with('user',User::find(Auth::id()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $pres = new Prescription();
        $pres->doctor_id = $r->doctor_id;
        $pres->patient_id = $r->patient_id;
        $pres->body = $r->body;
        if($pres->save()){
          Session::flash('success','Prescription Placed Successfully.');
        } else{
          Session::flash('error','There were some error placing the prescription');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pre = Prescription::find($id);
        return view('prescription.show')->with('pre',$pre)->with('user',User::find(Auth::id()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pre = Prescription::find($id);
        return view('prescription.edit')->with('pre',$pre)->with('user',User::find(Auth::id()));
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
        $pre = Prescription::find($id);
        $pre->body = $r->body;
        if($pre->save())
        {
          Session::flash('success','Prescription Updated Successfully');
        } else{
           Session::flash('error','Something went wrong');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function chat($id)
    {
      return view('chat')->with('id' ,$id)->with('user',User::find(Auth::id()));
    }
}
