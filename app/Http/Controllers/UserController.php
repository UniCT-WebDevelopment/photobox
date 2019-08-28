<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Login utente
     * 
     * @return Redirect to login or feed page
     */
    public function login() {
        $validator = $this->validateInputRules();
        if ($validator->fails()) {
            return Redirect::to('/')->withErrors($validator)->withInput(Input::except('password'));
        } else {
            $userdata = $this->getUserData();
            if (Auth::attempt($userdata)) {
                return Redirect::to('feed');
            } else {
                return Redirect::to('/')->withErrors(['login_fail'=>'Autenticazione fallita!']);
            }
        }
    }

    /**
     * Registra un nuovo utente
     * 
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

    /**
     * Esegue il logout
     * 
     * @return Redirect to view Home
     */
    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Mostra la view Profilo Utente
     * 
     * @return view profile
     */
    public function profile() {
        return view('user.profile', ['user' => Auth::user()]);
    }

    /**
     * Mostra la view Modifica Utente
     * 
     * @return view modify
     */
    public function modify() {
        return view('user.modify', ['user' => Auth::user()]);
    }

    /**
     * Validazione input login
     * 
     * @return Validator
     */
    private function validateInputRules() {
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:1'
        );
        return Validator::make(Input::all(), $rules);
    }

    /**
     * Estrae i dati utente passati dalla login form
     * 
     * @return array
     */
    private function getUserData() {
        return array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );
    }

    /**
     * Verifica se esiste un utente con una data email e/o un dato nickname
     * 
     * @param $email, $nickname
     * @return boolean true se esiste altrimenti false
     */
    private function checkAccountExist($email, $nickname) {
        return (User::where('email', '=', $email)->orWhere('nickname', '=', $nickname)->count() > 0) ? true : false;
    }

    /**
     * Crea un nuovo utente
     * 
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
        $user->bio = "";

        $user->save();
        return;
    }

    /**
     * Modifica le informazioni di un utente
     *
     * @param Request $request
     * @return Redirect alla view profile in caso di successo, altrimenti alla view modify
     */
    public function editProfile(Request $request) {
        $input = $request->all();
        $user = Auth::user();

        $user->nome = $input['nome'];
        $user->cognome = $input['cognome'];
        $user->dataNascita = $input['dataNascita'];
        $user->bio = $input['bio'];

        if(!empty($input['password']) && $input['password'] == $input['passwordControllo']) {
            $user->password = Hash::make($input['password']);
        } else {
            return redirect('modify');
        }
        $user->save();
        return redirect('profile');
    }
}
