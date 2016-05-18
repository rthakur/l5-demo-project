<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
      $role = Auth::user()->role_id;
      $users = User::where('id','!=',Auth::id());

      if($role != '1' && $role != '4'){
        $users = $users->where('entry_by',Auth::id())
        ->where('teamlead_id','=','');
      }

      if($role == '4'){
        $users = $users->where('entry_by',Auth::user()->entry_by)->where('teamlead_id',Auth::id());
      }


      $users = $users->get();
      $data['users'] = $users;

      $actionName = isset($this->getRoles()[0]->label)? $this->getRoles()[0]->label :'';
      $data['actionName'] = (Auth::user()->role_id == '1')? 'Users' : $actionName;
      return view('pages.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate(Request $request)
    {
      $actionName = isset($this->getRoles()[0]->label)? $this->getRoles()[0]->label :'';
      $data['actionName'] = (Auth::user()->role_id == '1')? 'User' : $actionName;

      $data['roles'] = $this->getRoles();
      return view('pages.user.form',$data);
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

     if(!$user->entry_by)
        $user->entry_by = Auth::id();

     $user->name = $request->name;
     $user->email = $request->email;
     $user->role_id = $request->role_id;

     if($request->password)
       $user->password = \Hash::make($request->password);
       $user->save();
       return redirect('user');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
      $actionName = isset($this->getRoles()[0]->label)? $this->getRoles()[0]->label :'';
      $data['actionName'] = (Auth::user()->role_id == '1')? 'User' : $actionName;

      $data['user'] = User::find($id);
      $data['roles'] = $this->getRoles();
      return view('pages.user.form',$data);
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
         'password'  => 'min:5|max:25'
     );
     return \Validator::make($request->all(), $rules);
   }

   private function getRoles(){
     $role = new Role;
     //if role if staff then able to create only teacher account
     if(Auth::user()->role_id == '2')
       $role = $role->where('id','3');
     //if role id teacher then able to create only teamlead account
     if(Auth::user()->role_id == '3')
       $role = $role->where('id','4');

      //if role id teamleader then able to create only teammember account
      if(Auth::user()->role_id == '4')
         $role = $role->where('id','5');

      return $role->get();
   }
}
