<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Accountant;
use Session;
use Auth;
use File;

class AccountantController extends Controller
{
  public function __construct()
  {
      $this->middleware('admin');
  }


 public function index()
 {
     $accountants = Accountant::all();

     return view('admin.accountants.index')->with('accountants',$accountants);
 }


 public function create()
 {

     return view('admin.accountants.create');
 }


 public function store(Request $r)
 {

   $this->validate($r,[
     'name' => 'required',
     'email' => 'required',
     'password' => 'required|min:6',
   ]);

   $user = new User;
   $accountant = new Accountant;

   $user->name = $r->name;
   $user->email = $r->email;
   $user->password = bcrypt($r->password);
   $user->isPatient = 0;
   $user->isAccountant = 1;
   $user->save();

   if($r->hasFile('avatar'))
   {
     $avatar = $r->avatar;
     $avatar_new_name = time().$avatar->getClientOriginalName();

     $avatar->move('uploads/avatars/accountants',$avatar_new_name);

     $user->avatar = 'uploads/avatars/accountants/' . $avatar_new_name;
     $user->save();
   }

   $accountant->user_id = $user->id;
   $accountant->save();

   $user->accountant_id = $accountant->id;
   $user->save();

   Session::flash('success','Accountant Added Successfully');

   return redirect()->route('admin.accountant.index');
 }


 public function show($id)
 {
     //
 }


 public function edit($id)
 {
     $user = User::find($id);

     return view('admin.accountants.edit')->with('user',$user);
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

       $avatar->move('uploads/avatars/accountants',$avatar_new_name);

       $user->avatar = 'uploads/avatars/accountants/' . $avatar_new_name;
       $user->save();
     }

     Session::flash('success','Accountant\'s details updated Successfully');

     return redirect()->route('admin.accountant.index');
 }

 public function destroy($id)
 {
     $user = User::find($id);
     $user->accountant->delete();

     if($user->avatar){
       $image_path = $user->avatar;
       if (File::exists($image_path)) {
          unlink($image_path);
      }
     }
     $user->delete();

     Session::flash('success','Accountant Has Been Removed From List');

     return redirect()->route('admin.accountant.index');
 }
}
