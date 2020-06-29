<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Player;
use App\Model\Team;

class PlayersController extends Controller
{
    /** 
     * Display a listing of the resource. 
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $players = Player::paginate(11);
        return view('home.players.index', compact('players'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Display Team.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getData($id)
    {   
        $players = Player::where('teamId', '=', $id)->get();
        $output = '';
        $output .= '  
      <div class="table-responsive">  
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
