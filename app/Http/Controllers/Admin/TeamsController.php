<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Team;
use DB;

class TeamsController extends Controller
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
        $teams = DB::table('teams')
                 ->select("teams.*","matches.result"
                ,DB::raw('matches.result, COALESCE(count(matches.result),0) as point'))
                 ->leftjoin("matches","matches.result","=","teams.teamName")
                 ->groupBy('matches.result')
                 ->get();
        return view('admin.teams.index', compact('teams'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /** 
     * Show the form for creating a new resource. 
     * @return \Illuminate\Http\Response 
    */
    public function create()
    {
        return view('admin.teams.create');
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
            'teamName' => 'required',
            'clubState' => 'required',
            'logoUri' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $team = new Team();
        if($file = $request->hasFile('logoUri')) {
            
            $file = $request->file('logoUri') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $team->logoUri = $fileName ;
        }
        $team->teamName = $request->teamName;
        $team->clubState = $request->clubState;
        $team->save();
        return redirect()->route('admin.teams.create')
                        ->with('success','Team created successfully.');
    }
    /** 
     * Show the form for editing the specified resource. 
     * @param  int  $id 
     * @return  \Illuminate\Http\Response 
     */ 
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.edit', compact('team'));
    }
    /** 
     * Update the specified resource in storage. 
     * @param  \Illuminate\Http\Request   $request 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function update(Request $request, $id)
    {   
        $team = Team::findOrFail($id);
        if($file = $request->hasFile('logoUri')) {
            $file = $request->file('logoUri');
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $team->logoUri = $fileName ;
        }
        $team->teamName = $request->teamName;
        $team->clubState = $request->clubState;
        $team->update();
        return redirect()->route('admin.teams.index');
    }
    /**
     * Display Team.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->route('admin.teams.index');
    }
    
}
