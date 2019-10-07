<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\DynamicField;

class DynamicFieldController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    function insert(Request $request)
    {

     if($request->ajax())
     {
      $rules = array(
       'nama.*'  => 'required|max:30',
       'username.*'  => 'required|max:30',
       'password.*'  => [
        'required',
        'regex:/[a-z]/',      
        'regex:/[A-Z]/',      
        'regex:/[0-9]/',      
       ],
       'email.*'  => 'required',
       'telefon.*'  => 'required',
       'posisi.*'  => 'required'
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
       $data = array(
        'nama' => $nama[$count],
        'username'  => $username[$count],
        'password'  => $password[$count],
        'email'  => $email[$count],
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
