<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function changeLocale(Request $request)
    {
        if(!in_array($request->locale, ['en','fil'])){
            return redirect()->back();
        }
        App::setLocale($request->locale);
        return redirect()->back();
    }
}
