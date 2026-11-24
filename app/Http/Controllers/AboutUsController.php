<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Founders;

class AboutUsController extends Controller
{
    public function index()
    {
        return view('user.aboutus.index');
    }
    public function threestarcafe()
    {
        return view('user.aboutus.threestarcafe');
    }
    
    // public function boardofdirectors()
    // {
    //     $bod_details= Board::all();
    //     return view('user.aboutus.boardofdirector', compact('bod_details'));
    // }
    // public function bod_details()
    // {
    //     $bod_details= Board::all();
    //     return view('user.aboutus.bod_details', compact('bod_details'));
    // }
    public function pastpresidents()
    {
        return view('user.aboutus.pastpresidents');
    }
    public function lifemembers()
    {
        return view('user.aboutus.lifemembers');
    }
    public function president_msg()
    {
        return view('user.president-msg.index');
    }
    public function founders()
    {
        $founders_details= Founders::all();
        return view('user.founders.index', compact('founders_details'));
    }
    
    
}
