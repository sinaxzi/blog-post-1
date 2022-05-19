<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        //validation
        
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('status','Invalid Login details');
        }

        return redirect()->route('dashboard');
    }
}
