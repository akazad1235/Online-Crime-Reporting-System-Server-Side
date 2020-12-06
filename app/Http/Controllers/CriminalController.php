<?php

namespace App\Http\Controllers;

use App\Models\Criminal;
use Illuminate\Http\Request;
use Image;

class CriminalController extends Controller
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
        return view('pages.criminals.addCriminals');
      
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
        $desc = $request->input('desc');
        $image = $request->file('image');
        // return $image;
        $fileName = rand(0, 999999999) . '_' . date('Ymdhis').'_' . rand(100, 999999999) . '.' . $image->getClientOriginalExtension();
       // return $fileName;
       Image::make($image)->resize(200, 200)->save(public_path('admin/images/criminals/').$fileName );

       $create = Criminal::create([
           'name' => $name,
           'image' => $fileName,
           'desc' => $desc
       ]);
       if ($create == true) {
           return back()->with('added_recorded', 'Criminals Added Successfully');
       }else {
           return back()->with('error_recorded', 'Criminals Added Faild');
       }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function show(Criminal $criminal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function edit(Criminal $criminal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criminal $criminal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Criminal $criminal)
    {
        //
    }
}
