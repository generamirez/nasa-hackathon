<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plant;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    const UPLOAD_PATH = 'public/modules/plants';
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
        return view('auth.Plants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        \DB::beginTransaction();
        $p = new Plant;
        $p->name = $request->title;
        $p->variety = $request->variety;
        $p->scientific_name = $request->scientific_name;
        $p->opt_grow_temp = $request->opt_grow;
        $p->min_grow_temp = $request->min_grow;
        $p->tips = json_encode([
            '1.27-2.54',
            '2.54-5.08',
            '5.08-7.62',
            '2.54-6.35',
        ]);
        if($request->image){
            $filename = ($request->title) . '-'. rand(0,1000). '-' . $request->image->getClientOriginalExtension();
            $p->image = $request->image->storeAs(PlantController::UPLOAD_PATH, $filename);
            $p->createThumbnail();
        }
        $p->save();
        \DB::commit();

        return redirect()->back()->with('success', 'Created a new listing!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
