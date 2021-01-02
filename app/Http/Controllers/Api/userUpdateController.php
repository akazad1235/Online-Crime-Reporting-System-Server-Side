<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userRegistration;
use App\Models\NationalID;

class userUpdateController extends Controller
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
        $image = $request->file('image');
        return $image;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getUserById =  userRegistration::find($id);
        
        return response()->json(['success'=>'user info get success', 'result'=>$getUserById]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     //   return $request->all();
    $existsNid =  NationalID::where('NID_No', $request->nid)->count();
        if($existsNid == true){
            $getUserData = userRegistration::where('id', $id)->find($id);
        // $image = $request->file('image');
        // return $image;
       // return $getUserData;
        $name= $request->name;
        $email= $request->email;
        $phone= $request->phone;
        $nid= $request->nid;
        $gender= $request->gender;
        $birth_day= $request->birth_day;
        $address= $request->address;
       // $image= $request->image;
        
     //   return $image;

     //return $request->$name;

        if($getUserData){
            $getUserData->name = $name;
           //  $getUserData->email = $email;
             $getUserData->phone = $phone;
             $getUserData->nid = $nid;
            $getUserData->gender = $gender;
            $getUserData->birth_day = $birth_day;
            $getUserData->address = $address;
    
            if($getUserData->save()){
                return response()->json(['success'=>'Your Profile Update success', 'status'=>200]);
            }    
        }else{
            return response()->json(['error'=>'Your NID not match, please try again valid NID', 'status'=>203]);
        }
        }else{
            return response()->json(['error'=>'Your NID not match, please try again valid NID', 'status'=>203]);
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
}
