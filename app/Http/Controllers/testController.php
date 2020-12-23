<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Complain;
use Image;



class testController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
      // return DB::table('criminals')->orderBy('id', 'desc')->get();
      return Complain::get();
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
        return $request;
        // return response()->json(['success' => 'complain added success', 'status'=>'200', 'data'=>  $request]);
        
        $regId = $request->input('reg_id');
        $stdId = $request->input('station_id');
        $crimeType = $request->input('crime_type');
        $desc = $request->input('desc');
        $place = $request->input('place');

        // $regId = 2;
        // $stdId = 6;
        // $crimeType ='test';
        // $desc = $request->input('desc');
        // $place ='testss';

        $image = $request->file('image');

      // return response()->json(['success' => 'complain added success', 'status'=>'200', 'data'=>  $image]);
       // return $image;
       // if($image || ){
           // $path = rand(0, 999999999).'.'.$image->getClientOriginalExtension();
            $fileName = rand(0, 999999999) . '_' . date('Ymdhis').'_' . rand(100, 999999999) . '.' . $image->getClientOriginalExtension();
       // return $fileName;
         Image::make($image)->resize(400, 400)->save(public_path('admin/images/complain/').$fileName );

         $files = [];
        if($request->hasFile('file')){

            $sl = 0;
            foreach($request->file('file') as $value)
            {
                $name = rand(0, 999999999) . '_' . date('Ymdhis').'_' . rand(100, 999999999) . '.' . $value->getClientOriginalExtension();
               // $files->save(public_path('admin/images/complain/').$name);  
                //Image::make($value)->resize(400, 400)->save(public_path('admin/images/complain/').$name );
                $value->move(public_path('admin/images/complain/'), $name);
                $files[] = $name;
                $sl++; 
            }
        }

       

        $data = [
            'reg_id' => $regId,
            'station_id' => $stdId,
            'complain_type' => $crimeType,
            'desc' => $desc,
            'address' => $place,
            'image' =>  $fileName,
            'file' =>  json_encode($files),
        
        ];
      //  }
        // else{
        //     $data = [
        //         'reg_id' => $regId,
        //         'station_id' => $stdId,
        //         'complain_type' => $crimeType,
        //         'desc' => $desc,
        //         'address' => $place,     
        //     ];
        // }
       
       
        if (Complain::create($data) == true) {
            return response()->json(['success' => 'complain added success', 'status'=>'200']);
        }else{
            return response()->json(['error' => 'complain added faild', 'status'=>'500']);
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

    public function complain(){
       return   DB::table('complains')->get();
       
    }

    public function createComplain(){
        return DB::table('police_stations')->get();
       // return response()->json(['Status'=>'login success','status-Code'=>200, 'station'=>$getStation]);
    }
    public function storeComplain(Request $request){
        return $request;
    }
    function criminals(){
        return DB::table('criminals')->orderBy('id', 'desc')->get();
    }
}
