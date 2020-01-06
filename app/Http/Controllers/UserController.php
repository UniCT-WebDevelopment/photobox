<?php

namespace App\Http\Controllers;

use App\Http\Traits\UserTrait;
use App\Http\Traits\ValidatorRulesTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    use UserTrait, ValidatorRulesTrait;

    /**
     * Login utente
     *
     * @return Redirect alla view login o profile
     */
    public function login()
    {
        $validator = $this->validateInputLogin();
        if ($validator->fails()) {
            return Redirect::to('/')->withErrors($validator)->withInput(Input::except('password'));
        } else {
            $userdata = $this->getUserData();
            if (Auth::attempt($userdata)) {
                return Redirect::to('feed');
            } else {
                return Redirect::to('/')->withErrors(['login_fail' => 'Autenticazione fallita!']);
            }
        }
    }

    /**
     * Registra un nuovo utente
     *
     * @param Request $request una Request HTTP
     * @return view Home
     */
    public function signin(Request $request)
    {
        $input = $request->all();
        if (!$this->checkAccountExist($input['email'], $input['nickname'])) {
            $validator = $this->validateInputSignin();
            if (!$validator->fails()) {
                $this->createUserAccount($input);
                return view('home', ['response' => 'success']);
            }
            $validator->errors()->add('signin_fail', 'Registrazione fallita!');
            return Redirect::to('/')->withErrors($validator)->withInput(Input::all());
        }
        return Redirect::to('/')
            ->withErrors(['signin_fail' => 'Account già esistente!']);
    }

    /**
     * Esegue il logout
     *
     * @return Redirect alla view Home
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Mostra la view Profilo Utente
     *
     * @return view profile
     */
    public function profile()
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    /**
     * Mostra la view Modifica Utente
     *
     * @return view editProfileInfo
     */
    public function editProfileInfoView()
    {
        return view('user.editProfileInfo', ['user' => Auth::user()]);
    }

    /**
     * Mostra la view Modifica Foto Profilo
     *
     * @return view editProfilePhotoView
     */
    public function editProfilePhotoView()
    {
        return view('user.editProfilePhoto', ['user' => Auth::user()]);
    }

    /**
     *  Modifica Foto Profilo
     *
     * @return view editProfilePhotoView
     */
    public function editProfilePhoto(Request $request)
    {
        $validation = $this->validateInputPhoto();
        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->getMessages()], 400);
        }
        $this->saveProfilePhoto($request, Auth::user());
        return response()->json('success', 200);
    }

    /**
     * Estrae i dati utente passati dalla login form
     *
     * @return Array
     */
    private function getUserData()
    {
        return array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        );
    }

    /**
     * Crea un nuovo utente
     *
     * @param Array $params array dei parametri dell'utente
     * @return Void
     */
    private function createUserAccount($params)
    {
        $this->createUser($params);
    }

    /**
     * Modifica le informazioni e/o la password di un utente
     *
     * @param Request $request una Request HTTP
     * @return Redirect alla view profile in caso di successo, altrimenti alla view editProfileInfo
     */
    public function editProfileInfo(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();

        // Modifica info e password dell'utente
        if (!empty($input['password']) && !empty($input['passwordControllo'])) {
            if ($input['password'] == $input['passwordControllo']) {
                $this->editUserInfo($user, $input);
                $this->changeUserPassword($user, $input);
            } else {
                return view('user.editProfileInfo', ['response' => 'fail'], ['user' => Auth::user()]);
            }
        } else {
            // Modifica solo info dell'utente
            $this->editUserInfo($user, $input);
        }
        return redirect('profile');
    }

    /**
     * Cancella un account
     *
     * @return Redirect alla view home
     */
    public function deleteAccount()
    {
        $user = Auth::user();
        $this->deleteUserFiles($user);
        $user->delete();
        return redirect('/');
    }

    /**
     * Mostra la view GuestProfile
     *
     * @return view guestProfile
     */
    public function guestProfileView(Request $request)
    {
        $id = $request->input('id');
        $guest = $this->getUserById($id);
        $listaPhoto = $guest->photos;
        return view('user.guestProfile', ['user' => Auth::user(), 'guest' => $guest, 'listaPhoto' => $listaPhoto]);
    }

    public function searchUsers(Request $request)
    {
        $searchParam = $request->input('searchParam');
        $response = $this->searchUsersByParam($searchParam);
        echo json_encode($response);
    }
}