<?php

namespace App\Http\Controllers;
use App\FirstTeam;
use Illuminate\Http\Request;

class YouthTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youthteam_details= FirstTeam::where('team', '=', 'Junior')->get();
        $g_details= FirstTeam::where('team', '=', 'Junior')->where('position', '=', 9)->get();
        $d_details= FirstTeam::where('team', '=', 'Junior')->where('position', '=', 10)->get();
        $m_details= FirstTeam::where('team', '=', 'Junior')->where('position', '=', 11)->get();
        $f_details= FirstTeam::where('team', '=', 'Junior')->where('position', '=', 12)->get();
        return view('user.junior-team.index', compact( 'youthteam_details', 'g_details', 'd_details', 'm_details', 'f_details'));
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
        //
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
