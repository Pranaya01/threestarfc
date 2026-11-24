<?php

namespace App\Http\Controllers;
use App\Board;
use Illuminate\Http\Request;

class BODController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bod_details= Board::all();
        $president_details= Board::where('designation', '=', 1)->get();
        $ipp_details= Board::where('designation', '=', 2)->get();
        $vp_details= Board::where('designation', '=', 3)->get();
        $gs_details= Board::where('designation', '=', 4)->orWhere('designation', '=', 5)->get();
        $treasurer_details= Board::where('designation', '=', 6)->orWhere('designation', '=', 7)->get();
        $member_details= Board::where('designation', '=', 8)->get();
        $advisor_details= Board::where('designation', '=', 9)->get();
        return view('user.bod.index', compact('bod_details', 'president_details', 'ipp_details', 'vp_details', 'gs_details' ,'treasurer_details', 'member_details', 'advisor_details'));
    }
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bod_details= Board::findOrFail($id);
        return view('user.bod.details', compact('bod_details'));
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
