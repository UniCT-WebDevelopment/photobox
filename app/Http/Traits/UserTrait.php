<?php
namespace App\Http\Traits;

use App\User;
use Illuminate\Support\Facades\Hash;

trait UserTrait
{
    /**
     * Verifica se esiste un utente con una data email e/o un dato nickname
     *
     * @param String $email la mail dell'utente
     * @param String $nickname il nickname dell'utente
     * @return boolean true se esiste altrimenti false
     */
    private function checkAccountExist($email, $nickname)
    {
        return (User::where('email', $email)->orWhere('nickname', $nickname)->count() > 0) ? true : false;
    }

    /**
     * Inserisce un nuovo utente a DB
     *
     * @param Array $params array dei parametri dell'utente
     * @return void
     */
    private function createUser($params)
    {
        $user = new User;
        $user->nome = $params['nome'];
        $user->cognome = $params['cognome'];
        $user->dataNascita = $params['dataNascita'];
        $user->nickname = $params['nickname'];
        $user->email = $params['email'];
        $user->password = Hash::make($params['password']);
        $user->bio = "";
        $user->save();
    }

    /**
     * Modifica le informazioni di un utente
     *
     * @param User $user il Model dell'utente
     * @param Array $input l'array che contiene i dati da front-end
     * @return void
     */
    private function editUserInfo($user, $input)
    {
        $user->nome = $input['nome'];
        $user->cognome = $input['cognome'];
        $user->dataNascita = $input['dataNascita'];
        $user->bio = $input['bio'];
        $user->save();
    }

    /**
     * Modifica la password di un utente
     *
     * @param User $user il Model dell'utente
     * @param Array $input l'array che contiene i dati da front-end
     * @return void
     */
    private function changeUserPassword($user, $input)
    {
        $user->password = Hash::make($input['password']);
        $user->save();
    }

    private function generateFileName($request)
    {
        $extension = $request->file->getClientOriginalExtension();
        return sha1(time() . time()) . ".{$extension}";
    }
}