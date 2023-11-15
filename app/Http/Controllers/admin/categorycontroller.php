<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class categorycontroller extends Controller
{
    public function index(){

    }

    public function create(){
        return view('admin.category.createcategory');
    }

    public function store(Request $request){
        $validator = Validator::make(request()->all(),[
            'name' =>'required',
            'slug' =>'required|unique:category',
        ]);

        if($validator->passes()){
            
        }
        else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
           
        }
    }


    public function update(){
        
    }

    public function edit(){
        
    }

    public function destroy(){
        
    }
}
