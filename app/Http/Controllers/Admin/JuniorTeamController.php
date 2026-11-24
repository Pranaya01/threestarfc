<?php

namespace App\Http\Controllers\Admin;
use App\FirstTeam;
use App\Value;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JuniorTeamController extends Controller
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
        $juniorteam_details = FirstTeam::where('team', '=', 'Junior')->orderBy('id', 'ASC')->latest()->paginate(10);
        return view('admin.junior-team.index', compact('juniorteam_details'))
                         ->with('i', (request()->input('page', 1) - 1) * 5);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juniorteam_details = FirstTeam::get();
        $value_details = Value::where('category_id', '=', 2)->get();
        return view('admin.junior-team.create', compact('juniorteam_details', 'value_details'));
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
           'date_of_birth' => $request->date_of_birth,
           'address' => $request->address,
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
            return redirect('admin/junior-team')->with('Success', 'Junior Team Player Detailed Saved!');
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
        $juniorteam_details = FirstTeam::findOrFail($id);
       $value_details = Value::where('category_id', '=', 2)->get();
        return view('admin.junior-team.edit', compact('juniorteam_details', 'value_details'));
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

        return redirect('admin/junior-team')->with('Success', 'Junior Team Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $juniorteam_details = FirstTeam::findOrFail($id);
        $juniorteam_details->delete();
        return redirect('admin/junior-team')->with('error', 'Junior Player Detail Deleted Successfully ');
    }
}
