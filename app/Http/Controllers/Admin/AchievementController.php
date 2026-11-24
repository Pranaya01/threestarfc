<?php

namespace App\Http\Controllers\Admin;
use App\Achievement;
use App\Tournament;
use App\Value;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AchievementController extends Controller
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
        $achievement_details= Achievement::orderBy('id', 'ASC')->latest()->paginate(10);
        return view('admin.achievement.index', compact('achievement_details'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $achievement_details= Achievement::get();
        $tournaments_details= Tournament::get();
        $value_details = Value::where('category_id', '=', 6)->get();  
        return view('admin.achievement.create', compact('achievement_details','tournaments_details', 'value_details'));
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
            'tournament_id' => 'required|integer|max:20',
            'achievement_type' => 'required|integer|max:20',
            'position' => 'required|string|max:20',
            'season' => 'required|string|max:20',

        ]);
        $input_achievement = array(
            'tournament_id' => $request->tournament_id,
            'achievement_type' => $request->achievement_type,
            'position' => $request->position,
            'season' => $request->season
         );
            Achievement::create($input_achievement);
             return redirect('admin/achievement')->with('Success', 'Achievement Detailed Saved!');
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
        $achievement_details= Achievement::findOrFail($id);
        $tournaments_details= Tournament::get();
        $value_details = Value::where('category_id', '=', 6)->get();  
        return view('admin.achievement.edit', compact('achievement_details','tournaments_details', 'value_details'));
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
            'tournament_id' => '',
            'achievement_type' => '',
            'position' => 'required|string|max:20',
            'season' => 'required|string|max:20',

        ]);
        $input_achievement = array(
            'tournament_id' => $request->tournament_id,
            'achievement_type' => $request->achievement_type,
            'position' => $request->position,
            'season' => $request->season
         );
         Achievement::whereId($id)->update($input_achievement);
         return redirect('admin/achievement')->with('Success', 'Achievement Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $achievement_details = Achievement::findOrFail($id);
        $achievement_details->delete();

        return redirect('admin/achievement')->with('error', 'Achievement Detail Deleted Successfully ');
    }
    public function achievement_search(Request $request)
    {
        $achievement_search = $request->get('achievement-query');
        $achievement_details = Achievement::whereHas('tournament_details', function ($query) use ($achievement_search) {
            $query->where('tournament_name', 'like', '%' . $achievement_search . '%');
       })->paginate(200);
        $tournaments_details = Tournament::all();
        return view ('admin.achievement.results',compact('achievement_details', 'tournaments_details'));
    }
}
