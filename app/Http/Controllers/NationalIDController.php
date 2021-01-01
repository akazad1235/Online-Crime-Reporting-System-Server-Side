<?php

namespace App\Http\Controllers;

use App\Models\NationalID;
use Illuminate\Http\Request;
use Image;

class NationalIDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.NID.AddNID');
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
        $name = $request->input('name');
        $fatherName = $request->input('father');
        $motherName = $request->input('mother');
        $birthDay = $request->input('birth-day');
        $bloodGroup = $request->input('blood-group');
        $zipCode = $request->input('zip-code');
        $nid = $request->input('nid-no');
        $addrss = $request->input('address');

        $image = $request->file('image');

        if($image){
            
            $fileName = rand(0, 999999999) . '_' . date('Ymdhis').'_' . rand(100, 999999999) . '.' . $image->getClientOriginalExtension();
            // return $fileName;
            Image::make($image)->resize(150, 150)->save(public_path('admin/images/nid/').$fileName );

            $data =[
                'name'  => $name,
                'father_name' => $fatherName,
                'mother_name' => $motherName,
                'birth_day' => $birthDay,
                'blood_group' => $bloodGroup,
                'zip_Code' => $zipCode,
                'NID_No' => $nid,
                'address' => $addrss,
                'image' => $fileName,
            ];

           $result =  NationalID::create($data);
           if($result){
               return 'success';
           }else{
               return 'false';
           }
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NationalID  $nationalID
     * @return \Illuminate\Http\Response
     */
    public function show(NationalID $nationalID)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NationalID  $nationalID
     * @return \Illuminate\Http\Response
     */
    public function edit(NationalID $nationalID)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NationalID  $nationalID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NationalID $nationalID)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NationalID  $nationalID
     * @return \Illuminate\Http\Response
     */
    public function destroy(NationalID $nationalID)
    {
        //
    }
}
