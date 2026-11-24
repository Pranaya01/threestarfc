<?php

namespace App\Http\Controllers\Admin;
use App\Board;
use App\Value;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoardController extends Controller
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
        $bod_details= Board::orderBy('id', 'ASC')->latest()->paginate(10);
        return view('admin/board/index', compact('bod_details'))
              ->with('i', (request()->input('page', 1) - 1) * 5);        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bod_details = Board::get();
        $value_details = Value::where('category_id', '=', 1)->get();
        return view('admin.board.create', compact('bod_details', 'value_details'));
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
            'designation' => 'required|string|max:20',
            'profession'=> '',
            'contact_no'=> '',
            'address'=> '',
            'contribution'=> '',
            'image'        =>  'image|max:2048'
        ]);
        $image = $request->file('image');

        $new_image= rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/boardimages'), $new_image);
        $input_board = array(
            'name'  => $request->name,
            'designation' => $request->designation,
            'profession'  => $request->profession,
            'contact_no' => $request->contact_no,
            'address' => $request->address,
            'contribution' => $request->contribution,
           'image' => $new_image
        );
            Board::create($input_board);
            return redirect('admin/board')->with('Success', 'Board of Directors Detailed Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bod_details = Board::findOrFail($id);
        return view('admin.board.show', compact('bod_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bod_details = Board::findOrFail($id);
        $value_details = Value::where('category_id', '=', 1)->get();
        return view('admin.board.edit', compact('bod_details', 'value_details'));
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
                'designation' => 'required|string|max:20',
                'profession'=> '',
                'contact_no'=> '',
                'address'=> '',
                'contribution'=> '',
                'image'        =>  'image|max:2048'
            ]);

            $news_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/boardimages'), $news_image);
        }
        else  // this is the else part when you dont want to update the image not required
        {
            $request->validate([
                'name' => 'required', 
                'designation' => 'required',
                'profession'=> '',
                'contact_no'=> '',
                'address'=> '',
                'contribution'=> '',
                'image'        =>  'image|max:2048'
            ]);
        }

        $input_board = array(
            'name'  => $request->name,
            'designation' => $request->designation,
            'profession'  => $request->profession,
            'contact_no' => $request->contact_no,
            'address' => $request->address,
            'contribution' => $request->contribution,
            'image' => $news_image
        );
  
        Board::whereId($id)->update($input_board);
        return redirect('admin/board')->with('Success', 'Board of Directors Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bod_details = Board::findOrFail($id);
        $bod_details->delete();

        return redirect('admin/board')->with('error', 'Board of Director Detail Deleted Successfully ');
    }
    public function boardsearch(Request $request)
    {
        $boardsearch = $request->get('board-query');
        $bod_details = Board::where('name' , 'like', '%'.$boardsearch.'%')->paginate(20);
        return view ('admin.board.results',compact('bod_details'));
    }
}
