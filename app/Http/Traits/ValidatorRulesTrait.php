<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

trait ValidatorRulesTrait
{
    /**
     * Validazione input login
     *
     * @return Validator
     */
    private function validateInputLogin()
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:8|max:200',
        );
        return Validator::make(Input::all(), $rules);
    }

    /**
     * Validazione input photo
     *
     * @return Validator
     */
    private function validateInputPhoto()
    {
        $rules = array(
            'file' => 'image',
        );
        return Validator::make(Input::all(), $rules);
    }

    /**
     * Validazione input registrazione account
     *
     * @return Validator
     */
    private function validateInputSignin()
    {
        $rules = array(
            'nome' => 'required|min:1|max:3',
            'cognome' => 'required|min:1|max:30',
            'nickname' => 'required|min:1|max:20',
            'email' => 'required|email|min:5|max:200',
            'password' => 'required|min:8|max:200',
        );
        return Validator::make(Input::all(), $rules);
    }
}