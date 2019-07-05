<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request) {
        //TODO Verificare login utente
        return redirect('/feed');
    }

    public function signin(Request $request) {
        return 'ok';
    }

    public function profile(Request $request) {
        return view('user.profile');
    }

    public function modify(Request $request) {
        return view('user.modify');
    }
}
