<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\FirstTeam;
use App\Value;
use App\Http\Controllers\Controller;
class FirstTeamController extends Controller
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
    public function index(Request $request)
    {
        $firstteam_details = FirstTeam::orderBy('id', 'ASC')->where('team', '=', 'Senior')->latest()->paginate(10);
        return view('admin.first-team.index', compact('firstteam_details'))
                         ->with('i', (request()->input('page', 1) - 1) * 5);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $firstteam_details = FirstTeam::where('team', '=', 'Senior')->get();
        $value_details = Value::where('category_id', '=', 2)->get();
        return view('admin.first-team.create', compact('firstteam_details', 'value_details'));
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
            'fullname' => 'required|string',
            'date_of_birth' => 'string|max:20',
            'address' => '',
            'team' => 'required|string|max:20',
            'gender' => 'required|string|max:20',
            'position' => 'required|string|max:20',
            'country' => 'required|string|max:20', 
            'height' => '',
            'weight' => '',
            'prefered_foot' => 'required|string|max:20',
            'jersey_no' => '',
            'image'        =>  'image|max:4096'
        ]);
        $image = $request->file('image');

        $new_image= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/team'), $new_image);
        $input_player = array(
           'fullname' => $request->fullname,
           'team' => 'required|string|max:20',
           'date_of_birth' => $request->date_of_birth,
           'address' => $request->address,
           'team' => $request->team,
           'gender' => $request->gender,
           'position' => $request->position,
           'country' => $request->country,
           'height' => $request->height,
           'weight' => $request->weight,
           'prefered_foot' => $request->prefered_foot,
           'jersey_no' => $request->jersey_no,
           'image' => $new_image
        );
            FirstTeam::create($input_player);
            return redirect('admin/first-team')->with('Success', 'First Team Player Detailed Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //    $firstteam_details = FirstTeam::findOrFail($id);
    //    return view('admin.first-team.show', compact('firstteam_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $firstteam_details = FirstTeam::findOrFail($id);
       $value_details = Value::where('category_id', '=', 2)->get();
        return view('admin.first-team.edit', compact('firstteam_details', 'value_details'));
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
        $player_image = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')  
        {
            $request->validate([
                'fullname' => 'required|string',
                'date_of_birth' => 'string|max:20',
                'team' => 'required|string|max:20',
                'address' => '',
                'gender' => 'required|string|max:20',
                'position' => 'required|string|max:20',
                'country' => 'required|string|max:20', 
                'height' => '',
                'weight' => '',
                'prefered_foot' => 'required|string|max:20',
                'jersey_no' => '',
                'image'        =>  'image|max:4096'
            ]);

            $player_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/team'), $player_image);
        }
        else  // this is the else part when you dont want to update the image not required
        {
            $request->validate([
                'fullname' => 'required|string',
                'date_of_birth' => 'string|max:20',
                'team' => 'required|string|max:20',
                'address' => '',
                'gender' => 'required|string|max:20',
                'position' => 'required|string|max:20',
                'country' => 'required|string|max:20', 
                'height' => '',
                'weight' => '',
                'prefered_foot' => 'required|string|max:20',
                'jersey_no' => '',
                'image'        =>  'image|max:4096'
            ]);
        }

        $input_player = array(
            'fullname' => $request->fullname,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'team' => $request->team,
            'gender' => $request->gender,
            'position' => $request->position,
            'country' => $request->country,
            'height' => $request->height,
            'weight' => $request->weight,
            'prefered_foot' => $request->prefered_foot,
            'jersey_no' => $request->jersey_no,
            'image' => $player_image
        );
  
        FirstTeam::whereId($id)->update($input_player);

        return redirect('admin/first-team')->with('Success', 'First Team Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $firstteam_details = FirstTeam::findOrFail($id);
        $firstteam_details->delete();
        return redirect('admin/first-team')->with('error', 'Junior Player Detail Deleted Successfully ');
    }
    public function team_search(Request $request)
    {
        $teamsearch = $request->get('team-query');
        $firstteam_details = FirstTeam::where('fullname' , 'like', '%'.$teamsearch.'%')->paginate(20);
        return view ('admin.first-team.results',compact('firstteam_details'));
    }
}
