<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\accountActive;
use App\Models\userRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return userRegistration::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getUser =  userRegistration::where('id', $id)->find($id);
        return response()->json(['success'=>'you are a active user', 'result'=>$getUser]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     //  return userRegistration::where('email', $id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $getUser =  userRegistration::where('id', $id)->find($id);
        // return $getUser;
         $name =  $getUser['name'];
         $id =  $getUser['id'];
         $email =  $getUser['email'];
         $code =  $getUser['varification_code'];
         //return $code;
         $varification_code = Str::random(40);
         
          if($code){
            return response()->json(['success'=>'you are a active user', 'result'=>$getUser]);
          }else{
            $getUser->varification_code = $varification_code;
            $getUser->save();
          //  return 'update';
               Mail::to($email)->send(new accountActive($name, $id, $varification_code));
            return response()->json(['success'=>'Activation code send success, Please Check Your Email', 'result'=>$getUser]);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function verifyAcc($id, $token){
        //return $token;
        $verifyUserByToken =  userRegistration::where('varification_code', $token)->find($id);
      //  return $verifyUserByToken;
        if ($verifyUserByToken == true) {
            $verifyUserByToken->acc_active = 1;
            $verifyUserByToken->save();
            return response()->json(['success' => 'Well Done!!!, Your are a valid User', 'status' => '200']);
        }else{
            return Redirect::to('http://localhost:3000/viewComplain');
            return response()->json(['error' => 'Sorr!!, Your Token Invalid, Try Again', 'status' => '200']);
        }
       // $verifyUserByToken->where('varification_code', $token)->get();
       // return $verifyUserByToken;
      return Redirect::to('http://localhost:3000/viewComplain');
       
        
    }
}
