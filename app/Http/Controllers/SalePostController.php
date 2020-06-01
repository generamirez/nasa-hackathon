<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalePost;
use DB;

class SalePostController extends Controller
{
    const UPLOAD_PATH = 'public/modules/posts';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "For Sale";
        $posts = SalePost::where('user_id', '!=', \Auth::user()->id);
        if($request->type){
            $posts = $posts->where('type','LIKE',$request->type);
        }
        $posts = $posts->paginate(20);
        return view('FarmerDashboard.SalesPost.index', compact('posts','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FarmerDashboard.SalesPost.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $sp = new SalePost;
        $sp->title = $request->title;
        $sp->description = $request->description;
        $sp->available = $request->available;
        $sp->price = $request->price;
        $sp->user_id = \Auth::user()->id;
        if($request->image){
            $filename = ($request->title) . '-'. rand(0,1000). '-' . $request->image->getClientOriginalExtension();
            $sp->image = $request->image->storeAs(SalePostController::UPLOAD_PATH, $filename);
            $sp->createThumbnail();
        }
        $sp->save();
        DB::commit();

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
        $post = SalePost::find($id);
        return view('FarmerDashboard.SalesPost.show', compact('post'));
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

    public function myListings(Request $request)
    {
        $title = "My Listings";
        $posts = SalePost::where('user_id', '=', \Auth::user()->id)
        ->where('sold',false)
        ->paginate(20);
        $my_list = true;
        return view('FarmerDashboard.SalesPost.index', compact('posts','my_list','title'));
    }

    public function sell(Request $request)
    {
        $sp = SalePost::find($request->id);
        $sp->sold = true;
        $sp->save();

        return redirect()->back()->with('success', 'Successfully sold!');
    }
}
