<?php

namespace App\Http\Controllers;
use App\FirstTeam;
use App\FormerPlayers;
use Illuminate\Http\Request;

class FirstTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firstteam_details= FirstTeam::where('team', '=', 'Senior')->get();
        $gk_details= FirstTeam::where('team', '=', 'Senior')->where('position', '=', 9)->get();
        $defender_details= FirstTeam::where('team', '=', 'Senior')->where('position', '=', 10)->get();
        $midfielder_details= FirstTeam::where('team', '=', 'Senior')->where('position', '=', 11)->get();
        $forward_details= FirstTeam::where('team', '=', 'Senior')->where('position', '=', 12)->get();
        return view('user.senior-team.index', compact( 'firstteam_details', 'gk_details', 'defender_details', 'midfielder_details', 'forward_details'));
    }
    public function formerplayers()
    {
        
        $formerplayers_details= FormerPlayers::orderBy('id', 'ASC')->latest()->paginate(20);
        return view('user.past-players.index', compact( 'formerplayers_details'))
                        ->with('i', (request()->input('page', 1) - 1) * 5);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team_details= FirstTeam::findOrFail($id);
        return view('user.senior-team.details', compact('team_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
