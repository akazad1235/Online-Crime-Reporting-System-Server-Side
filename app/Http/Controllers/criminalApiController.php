<?php

namespace App\Http\Controllers;

use App\Models\Criminal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class criminalApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::table('criminals')->orderBy('id', 'desc')->get();
        return response()->json(['result'=>$result, 'status'=>'200']);
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
        $getCriminalById = Criminal::find($id);

        //get all admin or super admin info by criminal foreign key id
        $getAdmin = User::where('id', $getCriminalById->admin_id)->get();
        $adminName = $getAdmin[0]['name'];
        $admin_rules = $getAdmin[0]['is_admin'];
        $admin = (object) [
            'adminName' =>  $adminName,
            'admin_rules' => $admin_rules,
        ];

        
        return response()->json(['success'=>'Criminal get success', 'status'=>200, 'result'=>$getCriminalById, 'admin'=> $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        //
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
