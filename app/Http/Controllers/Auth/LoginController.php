<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {  
        $inputVal = $request->all();

      //  return $inputVal;

        $email =  $inputVal['email'];
        //return $email;
        $getUser = User::where('email',$email)->get();
       //return $getUser;
        $userCount = $getUser->count();
       // return $userCount;
       $getStationId = $getUser[0]['station'];
    //   for($i = 0; $i<$userCount; $i++){
    //     return $getUser[$i]['station'];
    //   }  
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $inputVal['email'], 'password' =>$inputVal['password']))){
            if (auth()->user()->is_admin == 1) {
                //session()->put('stationId', $getStationId);
                session(['stationId'=>$getStationId]);
                return redirect()->route('admin.dashboard');
                
            }else{
                if ($userCount == 1) {
                    session(['stationId'=>$getStationId]);
                    return redirect()->route('admin.dashboard');
                }
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email & Password are incorrect.');
        }     
    }
}


