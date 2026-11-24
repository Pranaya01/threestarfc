<?php

namespace App\Http\Controllers\Admin;
use App\Founders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoundersController extends Controller
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
        $founders_details= Founders::orderBy('id', 'ASC')->latest()->paginate(10);
        return view('admin/founders/index', compact('founders_details'))
              ->with('i', (request()->input('page', 1) - 1) * 5);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $founders_details = Founders::get();
        return view('admin.founders.create', compact('founders_details'));
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
            'position' => 'required|string|max:20',
            'image'        =>  'image|max:2048'
        ]);
        $image = $request->file('image');

        $new_image= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/founders'), $new_image);
        $input_founders = array(
            'name'  => $request->name,
            'position' => $request->position,
            'image' => $new_image
        );
            Founders::create($input_founders);
            return redirect('admin/founders')->with('Success', 'Founders Detailed Saved!');
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
        $founders_details = Founders::findOrFail($id);
        return view('admin.founders.edit', compact('founders_details'));
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
        $news_image = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')  
        {
            $request->validate([
                'name' => 'required|string|max:30', 
                'position' => 'required|string|max:20',
                'image'        =>  'image|max:2048'
            ]);

            $news_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/founders'), $news_image);
        }
        else  // this is the else part when you dont want to update the image not required
        {
            $request->validate([
                'name' => 'required', 
                'position' => 'required',
                'image'        =>  'image|max:2048'
            ]);
        }

        $input_founders = array(
            'name'  => $request->name,
            'position' => $request->position,
            'image' => $news_image
        );
  
        Founders::whereId($id)->update($input_founders);
        return redirect('admin/founders')->with('Success', 'Founders Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $founders_details = Founders::findOrFail($id);
        $founders_details->delete();

        return redirect('admin/founders')->with('error', 'Founders Detail Deleted Successfully ');
    }
}
