<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Result;
use App\Model\Match;
class ResultsController extends Controller
{
   /** 
     * Display a listing of the resource. 
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $result = Match::all();
        return view('home.players.index', compact('players'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
