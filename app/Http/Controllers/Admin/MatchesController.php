<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Match;
use App\Model\Team;
class MatchesController extends Controller
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
     * Display a listing of the resource. 
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $matches = Match::all();
        return view('admin.matches.index', compact('matches'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /** 
     * Show the form for creating a new resource. 
     * @return \Illuminate\Http\Response 
    */  
    public function create()
    {
        $teams = Team::all();
        return view('admin.matches.create', compact('teams'));
    }
    /** 
     * Store a newly created resource in storage. 
     * 
     * @param  \Illuminate\Http\Request   $request 
     * @return \Illuminate\Http\Response 
     */ 
    public function store(Request $request)
    {
        $this->validate($request, [
            'team1' => 'required',
            'team2' => 'required',
        ]);
        if($request->team1 == $request->team2){
            return redirect()->route('admin.matches.create')
                        ->with('macthes','match can not be same team please choose different one.');
        }
        $match = new Match();
        $match->team1 = $request->team1;
        $match->team2 = $request->team2;
        $match->save();
        return redirect()->route('admin.matches.create')
                        ->with('success','Match created successfully.');
    }
}
