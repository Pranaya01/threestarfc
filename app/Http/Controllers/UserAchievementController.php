<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Achievement;
class UserAchievementController extends Controller
{
    public function index()
    {
        $title_details= Achievement::all();
        return view('user.achievement.index', compact('title_details'));
    }
}
