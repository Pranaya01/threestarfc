<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Tournament;
use App\Value;
use App\Http\Controllers\Controller;
class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
        $tournaments_details= Tournament::orderBy('id', 'ASC')->latest()->paginate(10);
        return view('admin.tournament.index', compact('tournaments_details'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);    
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournaments_details= Tournament::get();
        $value_details = Value::where('category_id', '=', 3)->get();  
        return view('admin.tournament.create', compact('tournaments_details', 'value_details'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tournament_name' => 'required|string|max:40',
            'tournament_type' => 'required|string|max:20',
            // 'season' => 'required|string|max:20',
            'venue' => 'required|string|max:20'
        ]);
        $input_tournament = array(
            'tournament_name' => $request->tournament_name,
            'tournament_type' => $request->tournament_type,
            // 'season' => $request->season,
            'venue' => $request->venue,
         );
             Tournament::create($input_tournament);
             return redirect('admin/tournament')->with('Success', 'Tournaments Detailed Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tournaments_details = Tournament::findOrFail($id);
        return view('admin.tournament.show', compact('tournaments_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tournaments_details= Tournament::findOrFail($id);
        $value_details = Value::where('category_id', '=', 3)->get();  
        return view('admin.tournament.edit', compact('tournaments_details', 'value_details'));
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
        $request->validate([
            'tournament_name' => 'required|string|max:40',
            'tournament_type' => 'required|string|max:20',
            // 'season' => 'required|string|max:20',
            'venue' => 'nullable|string',
        ]);
        $input_tournament = array(
            'tournament_name' => $request->tournament_name,
            'tournament_type' => $request->tournament_type,
            // 'season' => $request->season,
            'venue' => $request->venue,
         );
         Tournament::whereId($id)->update($input_tournament);
         return redirect('admin/tournament')->with('Success', 'Tournaments Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tournaments_details = Tournament::findOrFail($id);
        $tournaments_details->delete();

        return redirect('admin/tournament')->with('error', 'Tournament Detail Deleted Successfully ');
    }
    public function tournamentsearch(Request $request)
    {
        $tournamentsearch = $request->get('tournament-query');
        $tournaments_details = Tournament::where('tournament_name' , 'like', '%'.$tournamentsearch.'%')->paginate(200);
        return view ('admin.tournament.results',compact('tournaments_details'));
    }
    
}
