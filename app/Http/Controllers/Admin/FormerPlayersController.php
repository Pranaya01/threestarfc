<?php

namespace App\Http\Controllers\Admin;
use App\FormerPlayers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormerPlayersController extends Controller
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
        $formerplayers_details = FormerPlayers::orderBy('id', 'ASC')->latest()->paginate(20);
        return view('admin.former-players.index', compact('formerplayers_details'))
                         ->with('i', (request()->input('page', 1) - 1) * 5);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formerplayers_details= FormerPlayers::get();
        return view('admin.former-players.create', compact('formerplayers_details'));
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
            'name' => 'required|string|max:30',
            'address' => 'required|string|max:30',

        ]);
        $input_former = array(
            'name' => $request->name,
            'address' => $request->address
         );
            FormerPlayers::create($input_former);
             return redirect('admin/past-players')->with('Success', 'Former Players Detailed Saved!');
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
        $formerplayers_details = FormerPlayers::findOrFail($id);  
        return view('admin.former-players.edit', compact('formerplayers_details'));
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
            'name' => 'string|max:30',
            'address' => 'string|max:30',

        ]);
        $input_former = array(
            'name' => $request->name,
            'address' => $request->address
         );
         FormerPlayers::whereId($id)->update($input_former);
         return redirect('admin/past-players')->with('Success', 'Former Player Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formerplayers_details = FormerPlayers::findOrFail($id);
        $formerplayers_details->delete();
        return redirect('admin/past-players')->with('error', 'Former Players Details Deleted Successfully ');
    }
}
