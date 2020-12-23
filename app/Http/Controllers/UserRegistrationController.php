<?php

namespace App\Http\Controllers;

use App\Models\userRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $name = $request->name;
        $email = $request->email;
        $gender = $request->gender;
        $birthDay = $request->birth_day;
        $password = Hash::make($request->password);
     //  return [$birthDay,$gender];

      $userRegister= userRegistration::create([
           'name' => $name,
           'email' => $email,
           'gender' => $gender,
           'birth_day' => $birthDay,
           'password' => $password
       ]);

       return response()->json(['success'=>'data insert success', 'status'=>'200','data'=>$userRegister]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userRegistration  $userRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(userRegistration $userRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userRegistration  $userRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(userRegistration $userRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userRegistration  $userRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userRegistration $userRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userRegistration  $userRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(userRegistration $userRegistration)
    {
        //
    }
}
