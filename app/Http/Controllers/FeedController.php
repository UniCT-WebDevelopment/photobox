<?php

namespace App\Http\Controllers;

use App\Http\Traits\PhotoTrait;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class FeedController extends Controller
{
    use PhotoTrait;

    public function show()
    {
        $user = Auth::user();
        $listaPhoto = $this->calcLikeAndUnlike(Photo::with('users')->get());
        return view('feed.feed', ['user' => Auth::user(), 'listaPhoto' => $listaPhoto]);
    }

    public function uploadFeedPhotoView()
    {
        return view('feed.uploadFeedPhoto', ['user' => Auth::user()]);
    }

    public function uploadFeedPhoto(Request $request)
    {
        $rules = array('file' => 'image');
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->getMessages()], 400);
        }

        $user = Auth::user();
        $fileName = sha1(time() . time()) . '.jpg';

        $path = storage_path('app/public/users/feed/' . $user->id . '/' . $fileName);

        //TODO estrapolare GPS
        $img = Image::make($request->file);
        $exif = $img->exif();

        $img->save($path, 80, 'jpg');
        $gps = $this->getGPS($img);

        $descrizione = Input::get('descrizione') != null ? Input::get('descrizione') : "";
        $this->savePhoto($fileName, $descrizione, $gps, $user->id);
        return response()->json('success', 200);
    }

    public function myPhotosView()
    {
        $user = Auth::user();
        $listaPhoto = $this->calcLikeAndUnlike(Photo::where('idUtente', '=', $user->id)->get());
        return view('feed.myPhotos', ['user' => Auth::user(), 'listaPhoto' => $listaPhoto]);
    }
}
