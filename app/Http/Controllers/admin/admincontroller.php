<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function admin(){
        return view("admin.adminlogin");
    }


    public function authenticate(Request $request){
        $validator = \Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->passes()){

        }
        else{
            return redirect('/admin/login')->withErrors($validator)->withInput($request->only('email'));
        }

        
    }
}
