<?php

namespace App\Http\Controllers;
use App\DynamicField;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use DB;
use Validator;

class DataController extends Controller
{
    //
    public function index(){
        $data = DynamicField::all();
        return view('/data',['data'=>$data]);
    }

    public function search(Request $request){

        $search = $request->search;
            $data = DynamicField::where('nama','like',"%".$search."%")
                      ->orWhere('username','like',"%".$search."%")
                      ->orWhere('email','like',"%".$search."%")
                      ->orWhere('telefon','like',"%".$search."%")
                      ->orWhere('posisi','like',"%".$search."%")->get();
    
            return view('/data',['data' => $data]);
    }

    public function edit(Request $request){

        $data = DynamicField::find($request->id);

        Validator::extend('phone', function($attribute, $value){
            return Str::startsWith($value, '0')||Str::startsWith($value, '+62');
        });

        Validator::extend('position', function($attribute, $value){
            return $value=='Frontend'||$value=='Backend'||$value=='Fullstack';
        });

      $rules = array(
       'nama'  => 'required|max:30',
       'username'  => 'required|max:30',
       'password'  => [
        'required',
        'regex:/[a-z]/',      
        'regex:/[A-Z]/',      
        'regex:/[0-9]/',      
       ],
       'email'  => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{1,6}$/ix',
       'telefon'  => 'required|phone',
       'posisi'  => 'required|position'
      );
      
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
        //   dd($error->errors()->all());
        $stringError = serialize($error->errors()->all());
        return Redirect::to(URL::previous() . "#".$data->email)->with('status'.$request->id, $stringError);
      }
    }
    
    public function delete(Request $request){
        $data = DynamicField::find($request->id);
            $data->delete();
            return redirect()->back()->with('status','Data '.$data->nama.' berhasil dihapus');
    }
}
