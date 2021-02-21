<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\ForeCast;
use Carbon\Carbon;
use App\Plant;
use App\Http\Requests\PlantShowRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(PlantShowRequest $request)
    {
        // get 3 months from now
        $now = Carbon::now()->subMonths(1);
        $x = 0;
        $fc = [];
        while($x < 3){
            $nowString = $now->addMonths(1)->format('Y/m');
            $thisMonth = ForeCast::where('date',$nowString)->first();
            $fc[$x] = array("date" => $thisMonth->date, "precipitation" => $thisMonth->precipitation, "temperature" => $thisMonth->temperature);
            $x++;
        }
        $plants = Plant::take(3)->get();

        // get historical data
        $hd = [];
        $start = Carbon::now()->subMonths(4);
        $x = 0;
        while($x < 3){
            $nowString = $start->addMonths(1)->format('Y/m');
            $thisMonth = ForeCast::where('date',$nowString)->first();
            $hd[$x] = array("date" => $thisMonth->date, "precipitation" => $thisMonth->precipitation, "temperature" => $thisMonth->temperature);
            $x++;
        }
        if(!isset($request->plant)){
            return view('home', compact('fc','plants','hd'));
        }
        $plant = Plant::find($request->plant);
        return view('home', compact('fc','plants', 'plant','hd'));
    }

    public function changeLocale(Request $request)
    {
        if(!in_array($request->locale, ['en','fil'])){
            return redirect()->back();
        }
        App::setLocale($request->locale);
        return redirect()->back();
    }

    public function test (Request $request)
    {
        dd($request->ip());
    }
}
