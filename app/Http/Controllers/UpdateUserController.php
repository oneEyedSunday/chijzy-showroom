<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Session;
use App\User;

class UpdateUserController extends Controller
{
    //
    public function update(Request $request){

    	// get a way to sanitoze input
    	// check if currner passwor was entered

    	$this->validate($request, [
    		'password' => 'required',
    		'email' => 'required|email'
    	]);

    	$flash_messages = '';	

    	// check if current password is correct
    	if(Hash::check($request->password, $request->user()->password)){
    	}else {
    		$flash_messages = 'Password isnt correct';
    		Session::flash('form-errors', $flash_messages); // make this an array, so error and sucess can be passed.
    		return redirect()->back();
    	}

    	$user = User::where('email', '=', $request->email);
    	// validate 
    	
    	// edit what needs to be edited
    		// get details
    	if($request->user()->email !== $request->email){
    		$user->email = $request->email;
    		$flash_messages .= 'Email changed';
    		Session::flash('form-errors', $flash_messages);
    		return redirect()->back();
    	}

    	if($request->user()->name !== $request->username){
    		$request->user()->fill([
    			'name' => $request->username
    		])->save();
    		$flash_messages .= 'Username changed.';
    		Session::flash('form-errors', $flash_messages);
    		return redirect()->back();
    	}
    	// hash password and set
    }
}
