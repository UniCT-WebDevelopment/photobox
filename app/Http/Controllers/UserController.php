<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request) {
        //TODO Verificare login utente
        return redirect('/feed');
    }

    /**
     * Registra un nuovo utente
     * @param $request a Request HTTP
     * @return view Home
     */
    public function signin(Request $request) {
        $input = $request->all();
        if(!$this->checkAccountExist($input['email'], $input['nickname']) ) {
            $this->createUserAccount($input);
            return view('home', ['response' => 'success']);
        } else {
            return view('home', ['response' => 'fail']);
        }
    }

    public function profile(Request $request) {
        return view('user.profile');
    }

    public function modify(Request $request) {
        return view('user.modify');
    }

    /**
     * Verifica se esiste un utente con una data email
     * @param $email, $nickname
     * @return boolean true se esiste altrimenti false
     */
    private function checkAccountExist($email, $nickname) {
        return (User::where('email', '=', $email)->orWhere('nickname', '=', $nickname)->count() > 0) ? true : false;
    }

    /**
     * Inserisce un utente nel DB
     * @param $params array dei parametri dell'utente
     * @return void
     */
    private function createUserAccount($params) {
        $user = new User;
        $user->nome = $params['nome'];
        $user->cognome = $params['cognome'];
        $user->dataNascita = $params['dataNascita'];
        $user->nickname = $params['nickname'];
        $user->email = $params['email'];
        $user->password = Hash::make($params['password']);

        $user->save();
        return;
    }
}
