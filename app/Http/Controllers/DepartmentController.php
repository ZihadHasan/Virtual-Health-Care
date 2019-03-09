<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Session;

class DepartmentController extends Controller
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
        $departments = Department::orderBy('name','asc')->paginate(8);

        return view('admin.departments.index')->with('departments',$departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $this->validate($r,[
          'name' => 'required'
        ]);

        $department = Department::create([
          'name' => $r->name
        ]);

        if($department){
          Session::flash('success','Department added successfully');
        } else{
          Session::flash('danger','Something Went Wrong.');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);

        return view('admin.departments.edit')->with('department',$department);
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
          'name' => 'required'
        ]);

        $department = Department::find($id);

        $department->name = $r->name;
        if($department->save()){
          Session::flash('success','Department updated successfully');
        } else{
          Session::flash('danger','Something went wrong');
        }

        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Department::destroy($id)){
          Session::flash('success','Department deleted successfully');
        } else{
          Session::flash('danger','Something went wrong');
        }

        return redirect()->route('department.index');
    }
}
