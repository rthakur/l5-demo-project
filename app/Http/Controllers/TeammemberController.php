<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;

class TeammemberController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function getManage($id)
  {

    $teamleader = $this->checkTeamleader($id);
    if(!$teamleader) return redirect('/');

    $users = User::where('entry_by',Auth::id())->where('teamlead_id',$id)->get();
    $data['users'] = $users;
    $data['teamleader'] = $teamleader;
    return view('pages.teammember.index',$data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function getCreate($id)
  {
    $data['id'] = $id;
    return view('pages.teammember.form',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function postStore(Request $request)
  {
   $validator = $this->validator($request);
   if ($validator->fails())
        return back()->withErrors($validator)->withInput();
   $user = User::firstOrCreate(array('id' => $request->id));

   if(!$user->teamlead_id)
    $user->teamlead_id = $request->teamlead_id;

   $user->name = $request->name;
   $user->entry_by = Auth::id();
   $user->email = $request->email;
    $user->role_id = 5;


   if($request->password)
     $user->password = \Hash::make($request->password);

     $user->save();
     return redirect('teammember/manage/'.$user->teamlead_id);
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function getEdit($id)
  {
    $data['user'] = User::find($id);
    return view('pages.teammember.form',$data);
  }

  public function postDelete(Request $request)
  {
    $user = User::find($request->id);
    if($user)
      $user->delete();
      return back();
  }

  private function validator($request)
 {
   $rules = array(
       'name' => 'required|min:3|max:200',
       'email' => 'email|unique:users,email,'.$request->id,
       'password'  => 'min:3|max:25'
   );
  return \Validator::make($request->all(), $rules);
 }

 private function checkTeamleader($id){
   $checkTeamleader = User::where('role_id','4')->where('id',$id)->first();
   return ($checkTeamleader)? $checkTeamleader : false;
 }

}
