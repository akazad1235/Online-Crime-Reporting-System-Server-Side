<?php

namespace App\Http\Controllers;

use App\Models\userRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

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
      //  return $request->all();
        //check user email exits or not
        $exitEmail =  userRegistration::where('email', $request->email)->count();
        
        $name = $request->name;
        $email = $request->email;
        $gender = $request->gender;
        $birthDay = $request->birth_day;
        $image = $request->file('image');
        $password = md5($request->password);
     //  return [$birthDay,$gender];

     if($exitEmail == true){
        return response()->json(['warning'=>'User Already Exits, try another email', 'status'=>'302']);
    }elseif($exitEmail == false){
        //   // return $image;
          $fileName = rand(0, 999999999) . '_' . date('Ymdhis').'_' . rand(100, 999999999) . '.' . $image->getClientOriginalExtension();
          // return $fileName;
          Image::make($image)->resize(200, 200)->save(public_path('admin/images/profile/').$fileName );

        $userRegister= userRegistration::create([
            'name' => $name,
            'email' => $email,
            'gender' => $gender,
            'birth_day' => $birthDay,
            'image' => $fileName,
            'password' => $password
        ]);
    return response()->json(['success'=>'User Registration Success', 'status'=>'200','data'=>$userRegister]);
    }else{
        return response()->json(['danger'=>'User Registration Faild', 'status'=>'404']);
    }

      

      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userRegistration  $userRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(userRegistration $userRegistration, $id)
    {
       // return $id;
       return userRegistration::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userRegistration  $userRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(userRegistration $userRegistration )
    {
        
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
