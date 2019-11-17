<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Traits\PhotoTrait;

class FeedController extends Controller {
    use PhotoTrait;

    public function show() {
        $user = Auth::user();
        $listaPhoto = $this->calcLikeAndUnlike(Photo::with('users')->get());
        return view('feed.feed', ['user' => Auth::user(), 'listaPhoto' => $listaPhoto]);
    }

    public function uploadFeedPhotoView() {
        return view('feed.uploadFeedPhoto', ['user' => Auth::user()]);
    }

    public function uploadFeedPhoto(Request $request) {
        $user = Auth::user();
        $extension = $request->file->getClientOriginalExtension();
        $fileName = sha1(time().time()).".{$extension}";
        $rules = array('file' => 'image');
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->getMessages()], 400);
        }
        $request->file->storeAs('public/users/feed/'.$user->id.'/', $fileName);
        
        //TODO estrapolare GPS
        $gps = '';

        $this->savePhoto($fileName, Input::get('descrizione'), $gps, $user->id);
        return response()->json('success', 200); 
    }

    public function myPhotosView() {
        $user = Auth::user();
        $listaPhoto = $this->calcLikeAndUnlike(Photo::where('idUtente', '=', $user->id)->get());
        return view('feed.myPhotos', ['user' => Auth::user(), 'listaPhoto' => $listaPhoto]);
    }
}
