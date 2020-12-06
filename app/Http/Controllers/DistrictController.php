<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allDistrict =  District::get();

        return view('pages.district.district', compact('allDistrict'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.district.addDistrict');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'district' => 'required|unique:districts',
        ]);

        $name = $request->input('district');

        $store = District::create([
            'district' => $name
        ]);
        if ($store == true) {
            return back()->with('added_recorded', 'District Added Successfully');
        }else{
            return back()->with('error_recorded', 'District Added Faild');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = base64_decode($id);
       $districtByID =  District::find($id);
       return view('pages.district.edit', compact('districtByID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $id = base64_decode($id);
        $getDistrict = District::find($id);
       
        $name = $request->input('district');
        $data = [
            'district' => $name
        ];
        if ($getDistrict->update($data) == true) {
            return back()->with('added_recorded', 'District Added Successfully');
        }else{
            return back()->with('error_recorded', 'District Added Faild');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        //
    }
}
