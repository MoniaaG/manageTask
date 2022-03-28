<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function show() {
        $community = Auth::user()->community;
        return view('community.show', compact('community'));
    }
}
