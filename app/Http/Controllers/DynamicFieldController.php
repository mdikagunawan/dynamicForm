<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\DynamicField;
use Crypt;
use Str;

class DynamicFieldController extends Controller
{
    //
    public function home(){
        return redirect('/insert');
    }

    public function index(){
        return view('index');
    }

    function insert(Request $request)
    {

     if($request->ajax()){

        Validator::extend('phone', function($attribute, $value){
            return Str::startsWith($value, '0')||Str::startsWith($value, '+62');
        });

        Validator::extend('position', function($attribute, $value){
            return $value=='Frontend'||$value=='Backend'||$value=='Fullstack';
        });

      $rules = array(
       'nama.*'  => 'required|max:30',
       'username.*'  => 'required|max:30',
       'password.*'  => [
        'required',
        'regex:/[a-z]/',      
        'regex:/[A-Z]/',      
        'regex:/[0-9]/',      
       ],
       'email.*'  => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{1,6}$/ix',
       'telefon.*'  => 'required|phone',
       'posisi.*'  => 'required|position'
      );
      
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

      $nama = $request->nama;
      $username = $request->username;
      $password = $request->password;
      $email = $request->email;
      $telefon = $request->telefon;
      $posisi = $request->posisi;
      for($count = 0; $count < count($nama); $count++)
      {
        $encryptPassword = Crypt::encryptString($password[$count]);
        $fEmail = strtolower($email[$count]);
        
       $data = array(
        'nama' => $nama[$count],
        'username'  => $username[$count],
        'password'  => $encryptPassword,
        'email'  => $fEmail,
        'telefon'  => $telefon[$count],
        'posisi'  => $posisi[$count]
       );
       $insert_data[] = $data; 
      }

      DynamicField::insert($insert_data);
      return response()->json([
       'success'  => 'Data Berhasil Ditambahkan'
      ]);
     }
    }
}
