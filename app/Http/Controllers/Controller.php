<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Log;
use App\Models\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $user = auth()->user();
    
        $totalCommission = $user->commissions()->sum('amount');
        $referralCommissions = $user->commissions()->with(['purchase.user'])->latest()->get();

        //$referralCommissions = $user->commissions()->with('purchase')->latest()->get();
    //dd( $referralCommissions);
        return view('referral.dashboard', compact('totalCommission', 'referralCommissions'));
    }
   
     public function postlogin(Request $request){
          
    // $data= Hash::make('12345');
          //  dd($data);
                   //dd($request->all());
                    if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],true)){
                       // dd($request->all());
                        if(Auth::check()){
                            
                            return redirect('referral\dashboard');
                            
                        }
                        
                        
                    }
                    else{
                        return redirect('/')->withFail('enter correct email and password');
                    }  
                   
                        }
                        public function logout(){
                            Auth::logout();
                            return redirect('/');
                        }
                        public function register()
                        {
                            return view('register'); 
                        }

     public function postregister(Request $request)
    {
        //dd($request->all());
        $request->validate([
                                    'name' => 'required|string|max:255',
                                    'email' => 'required|string|email|max:255|unique:users',
                                    'password' => 'required|string|confirmed',
                                    'referral_code' => 'nullable|string|exists:users,referral_code',
                                ]);

        $referrer = User::where('referral_code', $request->referral_code)->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'referred_by' => $referrer ? $referrer->id : null,
        ]);
        Auth::login($user);
        return redirect("referral\dashboard")->withSuccess( 'Registration successful!');


    }

}
