<?php

namespace App\Http\Controllers\Admin;
use App\PastPresidents;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PastPresidentsController extends Controller
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
        $pastpresidents_details = PastPresidents::orderBy('id', 'ASC')->latest()->paginate(10);
        return view('admin/pastpresidents/index', compact('pastpresidents_details'))
                              ->with('i', (request()->input('page', 1) - 1) * 5);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pastpresidents.create');
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
            'profession'=> '',
            'contact_no'=> '',
            'address'=> '',
            'term' => '',
            'contribution'=> '',
            'image'        =>  'image|max:2048'
        ]);
        $image = $request->file('image');

        $past_image= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/pastpresidents'), $past_image);
        $input_presidents = array(
            'name'  => $request->name,
            'profession'  => $request->profession,
            'contact_no' => $request->contact_no,
            'address' => $request->address,
            'term'=> $request->term,
            'contribution' => $request->contribution,
            'image' => $past_image
        );
           PastPresidents::create($input_presidents);
            return redirect('admin/pastpresidents')->with('Success', 'Past Presidents Detailed Saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pastpresidents_details = PastPresidents::findOrFail($id);
        return view('admin.pastpresidents.show', compact('pastpresidents_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pastpresidents_details = PastPresidents::findOrFail($id);
        return view('admin.pastpresidents.edit', compact('pastpresidents_details'));
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
        $president_image = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')  
        {
            $request->validate([
                'name' => 'required|string|max:30', 
                'profession'=> '',
                'contact_no'=> '',
                'address'=> '',
                'term' => '',
                'contribution'=> '',
                'image'        =>  'image|max:2048'
            ]);

            $president_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/pastpresidents'), $president_image);
        }
        else  // this is the else part when you dont want to update the image not required
        {
            $request->validate([
                'name' => 'required|string|max:30', 
                'profession'=> '',
                'contact_no'=> '',
                'address'=> '',
                'term' => '',
                'contribution'=> '',
                'image'        =>  'image|max:2048'
            ]);
        }

        $input_presidents = array(
            'name'  => $request->name,
            'profession'  => $request->profession,
            'contact_no' => $request->contact_no,
            'address' => $request->address,
            'term' => $request->term,
            'contribution' => $request->contribution,
            'image' => $president_image
        );
  
        PastPresidents::whereId($id)->update($input_presidents);
        return redirect('admin/pastpresidents')->with('Success', 'Past Presidents Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pastpresidents_details = PastPresidents::findOrFail($id);
        $pastpresidents_details->delete();
        return redirect('admin/pastpresidents')->with('error', 'Past Presidents Detail Deleted Successfully ');
    }
    public function past_search(Request $request)
    {
        $pastsearch = $request->get('past-query');
        $pastpresidents_details = PastPresidents::where('name' , 'like', '%'.$pastsearch.'%')->paginate(20);
        return view ('admin.pastpresidents.results',compact('pastpresidents_details'));
    }
}
