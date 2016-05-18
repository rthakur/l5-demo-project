<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use Storage,Auth;
use App\File;
use App\User;
use Carbon\Carbon;

class FileManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
      $files = new File;

      if(Auth::user()->role_id == '5')
        $files = $files->where('user_id',Auth::id());

      if(Auth::user()->role_id == '3'){
        $files = $files->whereIn('user_id',$this->getTeacherUserIds());
        }

      $files = $files->get();
      $data['files'] = $files;

      return view('pages.file_manager.index',$data);
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

      $filename = Auth::id().uniqid (rand(), true);
      $file_desc = '';
      if($request->has('file_desc') && $request->file_desc != '')
        $file_desc = $request->file_desc;

      if($request->hasFile('upload_file')){
        $file = $request->file('upload_file');
        $filename = $filename.'.'.$file->getClientOriginalExtension();
        $originalName = $file->getClientOriginalName();
        $path = Auth::id().'/'.$filename;

        $checkFileStored = Storage::disk('file_manager')->put(
              $path
              ,file_get_contents($file->getRealPath())
              ,'public');

        if($checkFileStored)
        {
          $storeFile                = new File;
          $storeFile->user_id       = Auth::id();
          $storeFile->name          = $filename;
          $storeFile->original_name = $originalName;
          $storeFile->description   = $file_desc;
          $storeFile->file_type     = $file->getClientMimeType();
          $storeFile->path          = $path;
          $storeFile->save();
        }
        return redirect('/filemanager');
      }
    }

    private function validator($request)
    {
      $rules = array(
        'upload_file' => 'mimes:jpeg,bmp,png,doc,docx,pdf,xls,rtf,txt',
      );
      return \Validator::make($request->all(), $rules);
    }

   public function getFile($id){
     $file = File::find($id);
     if($file){
       $content = Storage::disk('file_manager')->get($file->path);
       return response()->download(storage_path().'/filemanager'.'/'.$file->path);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postDestroy(Request $request)
    {
      $file = File::find($request->id);
      $file->deleted_at = Carbon::Now();
      $file->save();
      return redirect('/filemanager');
    }


    private function getTeacherUserIds(){
        $users = User::where('entry_by',Auth::id())
                        ->lists('id')->toArray();

        $members = User::whereIn('entry_by',$users)->lists('id')->toArray();
        return array_merge($users,$members);
    }
}
