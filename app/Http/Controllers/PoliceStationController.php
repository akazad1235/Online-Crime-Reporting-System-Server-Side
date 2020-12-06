<?php

namespace App\Http\Controllers;

use App\Models\policeStation;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;



class PoliceStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAllStation =  policeStation::get();
        return view('pages.policeStation.policeStation', compact('getAllStation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $district = District::orderBy('district', 'asc')->get();
        return view ('pages.policeStation.addStation', compact('district'));
    }                                                                          

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     function store(Request $request)
    {

        

        $validatedData = $request->validate([
            'policeStationName' => 'required|unique:police_stations',
            'email' => 'required|unique:police_stations',
            'district' => 'required',
            'address' => 'required | max:250',
        ]);
        

        $stationCode = (rand(10,1000));
        $policeStationName =  $request->input('policeStationName');
        $email =  $request->input('email');
        $district =  $request->input('district');
        $address =  $request->input('address');

            $dataInsert =  policeStation::insert([
                'policeStationName'=>$policeStationName,
                'email'=> $email,
                'stationCode'=> $stationCode,
                'district' => $district,
                'address' => $address
                  ]);
            
            if ($dataInsert) {
                return back()->with('added_recorded', 'Police Station Added Successfully');
            }else{
                return back()->with('error_recorded', 'Police Station Added Faild');
            }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moldes\policeStation  $policeStation
     * @return \Illuminate\Http\Response
     */
     function show(policeStation $policeStation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Moldes\policeStation  $policeStation
     * @return \Illuminate\Http\Response
     */
     function edit($id)
    {
        $id = base64_decode($id);
       $getDataById =  policeStation::find($id);

       //return $getDataById;
       
       return view ('pages.policeStation.editStation', compact('getDataById'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Moldes\policeStation  $policeStation
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $id = base64_decode($id);

        $dataUpdate = policeStation::find($id);

         //return $dataUpdate;
        
        $validatedData = $request->validate([
            'policeStationName' => 'required',
            'email' => 'required',
            'district' => 'required',
            'address' => 'required | max:250',
        ]);

        $data =[
            'policeStationName' =>  $request->input('policeStationName'),
            'email' =>  $request->input('email'),
            'district' =>  $request->input('district'),
            'address' =>  $request->input('address')
        ];

        
        
        

        if ($dataUpdate->update($data)) {
            return back()->with('added_recorded', 'Police Station Update Successfully');
        }else{
            return back()->with('error_recorded', 'Police Station Update Faild');
        }






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moldes\policeStation  $policeStation
     * @return \Illuminate\Http\Response
     */
     function destroy($id)
    {
        $id = base64_decode($id);
        $getData =  policeStation::find($id);
        $result = $getData->delete();

        if ($result == true) {
            return back()->with('added_recorded', 'Police Station Delete Successfully');
        }else{
            return back()->with('error_recorded', 'Police Station Delete Successfully');
        }
    }
}
