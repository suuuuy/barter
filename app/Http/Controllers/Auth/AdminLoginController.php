<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
		//Validate the form data
		$this->validate($request, [
			'email' =>'required',
			'password' => 'required|min:6'
		]);

		//Attemp to log the user in
		if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
			//if successful, the redirect to their intended location
			return redirect()->intended(route('admin.dashboard'));
		}

		//if unsuccessfull, then redirect back to the login
		return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
