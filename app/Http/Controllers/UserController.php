<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Login utente
     * 
     * @return Redirect alla view login o profile
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
     * @param Request $request una Request HTTP
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
     * @return Redirect alla view Home
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
     * @return view editProfileInfo
     */
    public function editProfileInfoView() {
        return view('user.editProfileInfo', ['user' => Auth::user()]);
    }

    /**
     * Mostra la view Modifica Foto Profilo
     *
     * @return view editProfilePhotoView
     */
    public function editProfilePhotoView() {
        return view('user.editProfilePhoto', ['user' => Auth::user()]);
    }

    /**
     *  Modifica Foto Profilo
     *
     * @return view editProfilePhotoView
     */
    public function editProfilePhoto(Request $request) {
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
        
        $request->file->storeAs('public/users/profile/'.$user->id.'/', $fileName);
  
        $user->imgProfilo = $fileName;
        $user->save();
  
        return response()->json('success', 200); 
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
     * @param String $email la mail dell'utente
     * @param String $nickname il nickname dell'utente
     * @return boolean true se esiste altrimenti false
     */
    private function checkAccountExist($email, $nickname) {
        return (User::where('email', '=', $email)->orWhere('nickname', '=', $nickname)->count() > 0) ? true : false;
    }

    /**
     * Crea un nuovo utente
     * 
     * @param Array $params array dei parametri dell'utente
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
     * Modifica le informazioni e/o la password di un utente
     *
     * @param Request $request una Request HTTP
     * @return Redirect alla view profile in caso di successo, altrimenti alla view modify
     */
    public function editProfileInfo(Request $request) {
        $input = $request->all();
        $user = Auth::user();

        // Modifica info e password dell'utente
        if(!empty($input['password'])) {
            if($input['password'] == $input['passwordControllo']) {
                $this->editUserInfo($user, $input);
                $this->changeUserPassword($user, $input);
            } else {
                return view('user.modify', ['response' => 'fail'], ['user' => Auth::user()]);
            }
        } else { // Modifica solo info dell'utente
            $this->editUserInfo($user, $input);
        }
        return redirect('profile');
    }

    /**
     * Modifica le informazioni di un utente
     * 
     * @param User $user il Model dell'utente
     * @param Array $input l'array che contiene i dati da front-end
     * @return void
     */
    private function editUserInfo($user, $input) {
        $user->nome = $input['nome'];
        $user->cognome = $input['cognome'];
        $user->dataNascita = $input['dataNascita'];
        $user->bio = $input['bio'];
        $user->save();
        return;
    }

    /**
     * Modifica la password di un utente
     * 
     * @param User $user il Model dell'utente
     * @param Array $input l'array che contiene i dati da front-end
     * @return void
     */
    private function changeUserPassword($user, $input) {
        $user->password = Hash::make($input['password']);
        $user->save();
        return;
    }

    /**
     * Restituisce l'ID di un utente cercato per email
     * 
     * @param String $email la mail dell'utente cercato
     * @return Integer l'ID dell'utente trovato
     */
    public function getUserIdByEmail($email) {
        return (User::where('email', '=', $email)->value('id'));
    }

}
