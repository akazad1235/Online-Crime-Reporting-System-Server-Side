<?php

namespace App\Http\Controllers;

use App\Models\Criminal;
use Illuminate\Http\Request;


class CriminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $allCrimicals =  Criminal::get();
        return view('pages.criminals.criminals', compact('allCrimicals'));
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
    public function edit($id)
    {
        $id = base64_decode($id);
        $getDataById = Criminal::find($id);
        return view('pages.criminals.editCriminals', compact('getDataById'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = base64_decode($id);
        $getCriminal = Criminal::find($id);
        $allImage = $getCriminal->image;

        //return $getCriminal->image;

        $name = $request->input('name');
        $desc = $request->input('desc');
        $image = $request->file('image');


        if(empty($image)){
           $data = [
               'name' => $name,
               'desc' => $desc
           ];
           $getCriminal->update($data);
           return back();

        }else{
            $fileName = rand(0, 999999999) . '_' . date('Ymdhis').'_' . rand(100, 999999999) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save(public_path('admin/images/criminals/').$fileName );
            unlink(public_path('admin/images/criminals/'.$allImage));
            $data = [
                'name' => $name,
                'desc' => $desc,
                'image' => $fileName
            ];
            $getCriminal->update($data);
           return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = base64_decode($id);
        $deleteCriminals = Criminal::find($id);
        //return $deleteCriminals;
        $image = $deleteCriminals->image;
        

        if ($deleteCriminals->delete()) {
            
            unlink(public_path('admin/images/criminals/'.$image));
            return back()->with('added_recorded', 'Criminals Delete Successfully');
        }else{
            return back()->with('error_recorded', 'Criminals Delete Faild');
        }

        
    }
}
