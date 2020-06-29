<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Result;
use App\Model\Match;
class ResultsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    /** 
     * Show the form for creating a new resource. 
     * @return \Illuminate\Http\Response 
    */
    public function create()
    {
        $matches = Match::all();
        return view('admin.results.create', compact('matches'));
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
            'TeamDetails' => 'required',
            'AllTeam' => 'required',
        ]);
        $match = new Match();
        $match->result = $request->AllTeam;
        $match->save();
        return redirect()->route('admin.matches.index')
                        ->with('success','Match created successfully.');
    }
    /** 
     * Update the specified resource in storage. 
     * @param  \Illuminate\Http\Request   $request 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function update(Request $request)
    {   
        $id = $request->TeamDetails;
        $match = Match::findOrFail($id);
        $match->result = $request->AllTeam;
        $match->update();
        return redirect()->route('admin.matches.index');
    }
}
