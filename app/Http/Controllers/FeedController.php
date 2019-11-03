<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Traits\PhotoTrait;

class FeedController extends Controller
{
    use PhotoTrait;

    public function show() {
        return view('feed.feed', ['user' => Auth::user()]);
    }

    public function uploadFeedPhotoView() {
        return view('feed.uploadFeedPhoto', ['user' => Auth::user()]);
    }

    public function uploadFeedPhoto(Request $request) {
        $user = Auth::user();

        $extension = $request->file->getClientOriginalExtension();
        $fileName = sha1(time().time()).".{$extension}";

        $rules = array(
            'file' => 'image'
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->getMessages()], 400);
        }
        
        $request->file->storeAs('public/users/feed/'.$user->id.'/', $fileName);

        $gps = ''; //TODO estrapolare GPS
        $this->savePhoto($fileName, Input::get('descrizione'), $gps, $user->id);
        
        return response()->json('success', 200); 
    }
}
