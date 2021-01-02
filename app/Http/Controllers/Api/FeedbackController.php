<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return Feedback::get();
        return  DB::table('feedback')
                ->leftJoin('user_registrations', 'feedback.reg_id', '=', 'user_registrations.id')
                ->select('feedback.*', 'user_registrations.image', 'user_registrations.name')
                ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
      //  return response()->json(['success'=>$request->all()]);
        $profession = $request->profession;
        $desc = $request->desc;
        $id = $request->reg_id;
        $data = [
            'profession' => $profession,
            'desc' => $desc,
            'reg_id' => $id
        ];

        $result = Feedback::create($data);
        if($result){
            return response()->json(['success'=>'Feedback Added Success', 'status'=>200]);
        }else{
            return response()->json(['error'=>'Feedback Added Faild', 'status'=>203]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'update';
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
