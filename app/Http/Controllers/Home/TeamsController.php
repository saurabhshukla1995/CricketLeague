<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Team;
use DB;
class TeamsController extends Controller
{
    /** 
     * Display a listing of the resource. 
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $teams = DB::table('teams')
                 ->select("teams.*","matches.result"
                ,DB::raw('matches.result, COALESCE(count(matches.result),0) as point'))
                 ->leftjoin("matches","matches.result","=","teams.teamName")
                 ->groupBy('matches.result')
                 ->get();
        
        return view('home.teams.index', compact('teams'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
