<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PagesController extends BaseController{

     public function index(){
          return view('index'); 
     }

     public function submitcontactus(){

          // Validation
          $input = $this->validate([
               'name' => 'required',
               'email' => 'required',
               'subject' => 'required',
               'message' => 'required',
          ]);

          if (!$input) { // Not valid

               $data['validation'] = $this->validator;

               return redirect()->back()->withInput()->with('validation', $this->validator);

          }else{ 
               // Set Session
               session()->setFlashdata('message', 'Submitted Successfully!');
               session()->setFlashdata('alert-class', 'alert-success');

          }
          return redirect()->route('/');

     }
}

