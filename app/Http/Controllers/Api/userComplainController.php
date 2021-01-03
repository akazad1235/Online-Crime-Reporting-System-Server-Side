<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\Criminal;
use App\Models\userRegistration;
use Image;
use Illuminate\Support\Facades\DB;

class userComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $totalUser = DB::table('user_registrations')->pluck('id')->count();
        $totalComp = DB::table('complains')->pluck('id')->count();
        $done = DB::table('complains')->where('comp_status', 2)->pluck('comp_status')->count();
        $pending = DB::table('complains')->where('comp_status', 0)->pluck('comp_status')->count();

        return response()->json(['totalUser'=>$totalUser, 'totalComp'=>$totalComp, 'done'=>$done,'pending'=>$pending, 'status'=>200]);
        
        return json_decode($number);
        
        return $collection->all();
        
             $adddd =  DB::table('complains')
            ->join('user_registrations', 'complains.reg_id', '=', 'user_registrations.id')
            ->where('reg_id',20)
            ->get();

            return $adddd;

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
       // return $request->all();
        // return response()->json(['success' => 'complain added success', 'status'=>'200', 'data'=>  $request]);
        
        $regId = $request->input('reg_id');
        $stdId = $request->input('station_id');
        $crimeType = $request->input('crime_type');
        $desc = $request->input('desc');
        $place = $request->input('place');
        $comp_code =  mt_rand(1, 99999999);

      //  $image = $request->file('image');

         $CheckUser = userRegistration::find($regId);
        
       // return response()->json(['success' => 'complain added success', 'status'=>'200', 'result'=>$CheckUser]);
        //return $CheckUser->nid;
        if ($CheckUser->acc_active && $CheckUser->nid) {
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
            'complain_name' => 'test',
            'desc' => $desc,
            'place' => $place,
            'comp_code' => $comp_code,
         //   'image' =>  $fileName,
             'file' =>  json_encode($files),
        
        ];
       // return $data;
       
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
            return response()->json(['success' => 'Complain added success', 'status'=>'200', 'result'=>$data]);
        }else{
            return response()->json(['error' => 'Complain Added Faild', 'status'=>'500']);
        }
        }else{
            return response()->json(['error' => 'Your Account or NID not Active', 'status'=>'500']);
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
     //   return 'ok';
        $complianDataById =  DB::table('complains')
            ->leftJoin('user_registrations', 'complains.reg_id', '=', 'user_registrations.id')
            ->select('complains.*', 'user_registrations.name', 'user_registrations.email')
            ->where('reg_id',$id)
            ->get();
            //return $complianDataById;

         $details = Complain::find($id);   

    //  return $details;
        if ($complianDataById) {
            # code...
        }
            if($details){
                $file = $details->file;
                $convertFile = json_decode($file);
                return response()->json(['success'=>'Complain Data showed' , 'status'=>'200', 'result'=>$details, 'convertFile'=>$convertFile]);
            }else{

                return response()->json(['success'=>'Complain Data showed' , 'status'=>'200', 'result'=>$complianDataById]);
            }

            
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
