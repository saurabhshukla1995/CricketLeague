<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Player;
use App\Model\Team;

class PlayersController extends Controller
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
        $players = Player::paginate(11);
        return view('admin.players.index', compact('players'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /** 
     * Show the form for creating a new resource. 
     * @return \Illuminate\Http\Response 
    */
    public function create()
    {
        $teams = Team::all();
        return view('admin.players.create', compact('teams'));
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
            'teamId' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'playerJerNo' => 'required',
            'country' => 'required',
            'playerHistory' => 'required',
            'imageUri' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $player = new Player();
        if($file = $request->hasFile('imageUri')) {
            
            $file = $request->file('imageUri') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $player->imageUri = $fileName ;
        }
        $player->teamId = $request->teamId;
        $player->firstName = $request->firstName;
        $player->lastName = $request->lastName;
        $player->playerJerNo = $request->playerJerNo;
        $player->country = $request->country;
        $player->playerHistory = $request->playerHistory;
        $player->save();
        return redirect()->route('admin.players.create')
                        ->with('success','Team created successfully.');
    }
    /** 
     * Show the form for editing the specified resource. 
     * @param  int  $id 
     * @return  \Illuminate\Http\Response 
     */  
    public function edit($id)
    {
        $teams = Team::all();
        $players = Player::findOrFail($id);
        return view('admin.players.edit', compact('players', 'teams'));
    }
    /** 
     * Update the specified resource in storage. 
     * @param  \Illuminate\Http\Request   $request 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function update(Request $request, $id)
    {   
        $player = Player::findOrFail($id);
        if($file = $request->hasFile('imageUri')) {
            
            $file = $request->file('imageUri');
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $player->imageUri = $fileName ;
        }
        $player->teamId        = $request->teamId;
        $player->firstName     = $request->firstName;
        $player->playerJerNo   = $request->playerJerNo;
        $player->country       = $request->country;
        $player->playerHistory = $request->playerHistory;
        $player->update();
        return redirect()->route('admin.players.index');
    }
    /** 
     * Remove the specified resource from storage. 
     * @param  int  $id 
     * @return  \Illuminate\Http\Response 
     */  
    public function show($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();
        return redirect()->route('admin.players.index');
    }
    /** 
     * Remove the specified resource from storage. 
     * @param  int  $id 
     * @return  \Illuminate\Http\Response 
     */  
    public function getData($id)
    {   
        $players = Player::where('teamId', '=', $id)->get();
        $output = '';
        $output .= 
        '<div class="table-responsive">  
            <table class="table table-bordered"> <tr><th style="font-size:23px;">Name</th></tr>'; 
        foreach($players as $player) 
        {  
            $output .= '  
                    <tr>  
                        <td width="70%">'.$player['firstName']. ' '.$player['lastName'].'</td>  
                    </tr>  
                    
                    ';  
        }  
        $output .= "</table></div>";  
        echo $output;
    }
}
