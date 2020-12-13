<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use DB;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= session('userId');
        $profileData  = DB::table('profiles')
        ->join('users', 'profiles.user_id', '=', 'users.id')
        ->join('police_stations', 'profiles.station_id', '=', 'police_stations.id')
        ->select('profiles.*', 'users.email', 'users.name' , 'police_stations.*')
        ->where('user_id', $id)
        ->get();

        //  return $getUserById;
        //session()->flush();
       // return session('stationId');
       // return session('userId');
      //  return session()->all();
     // return  session()->get([0]['stationId']);
  
       // $profileData = Profile::where('user_id', session('userId'))->get();
       // return $getUserById;
        //return session('userId');

         return view('pages.profile.profile', compact('profileData'));
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
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('pages.profile.updateProfile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
