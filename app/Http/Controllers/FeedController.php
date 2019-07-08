<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function show(Request $request) {
        $user = Auth::user();
        return view('feed', ['user' => $user]);
    }
}
