<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Match;
use App\Model\Team;
class MatchesController extends Controller
{
    /** 
     * Display a listing of the resource. 
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $matches = Match::all();
        return view('home.matches.index', compact('matches'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
