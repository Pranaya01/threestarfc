<?php

namespace App\Http\Controllers\Admin;
use App\Staff;
use App\Value;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
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
        $staff_details= Staff::orderBy('id', 'ASC')->latest()->paginate(10);
        return view('admin.staff.index', compact('staff_details'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff_details= Staff::all();
        $value_details = Value::where('category_id', '=', 5)->get();
        return view('admin.staff.create', compact('staff_details', 'value_details'));
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
            'contact_no'=> 'required|string|max:20',
            'designation'=> 'required|string|max:20',
            'image'        =>  'image|max:4096'
            ]);
        $image = $request->file('image');

        $member_image= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/staff'), $member_image);
        $input_staff = array(
            'name'  => $request->name,
            'contact_no' => $request->contact_no,
            'designation' => $request->designation,
            'image' => $member_image
        );
            Staff::create($input_staff);
            return redirect('admin/staff')->with('Success', 'Staff Detailed Saved!');
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
        $staff_details = Staff::findOrFail($id);
        $value_details = Value::where('category_id', '=', 5)->get();
        return view('admin.staff.edit', compact('staff_details', 'value_details'));
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
        $staff_image = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')  
        {
            $request->validate([
                'name' => 'required|string|max:30', 
                'contact_no'=> 'required|string|max:20',
                'designation'=> 'required|string|max:20',
                'image'        =>  'image|max:4096'
            ]);

            $staff_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/staff'), $staff_image);
        }
        else  // this is the else part when you dont want to update the image not required
        {
            $request->validate([
                'name' => 'string|max:30', 
                'contact_no'=> 'string|max:20',
                'designation'=> 'string|max:20',
                'image'        =>  'image|max:4096'
            ]);
        }
        $input_staff = array(
            'name'  => $request->name,
            'contact_no' => $request->contact_no,
            'designation' => $request->designation,
            'image' => $staff_image
        );
        Staff::whereId($id)->update($input_staff);
        return redirect('admin/staff')->with('Success', 'Staff Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff_details = Staff::findOrFail($id);
        $staff_details->delete();
        return redirect('admin/staff')->with('error', 'Staff Detail Deleted Successfully ');
    }

    public function staff_search(Request $request)
    {
        $staffsearch = $request->get('staff-query');
        $staff_details = Staff::where('name' , 'like', '%'.$staffsearch.'%')->paginate(20);
        return view ('admin.staff.results',compact('staff_details'));
    }
}

