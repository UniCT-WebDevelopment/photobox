<?php

namespace App\Http\Controllers;

use App\Http\Traits\VotoTrait;
use App\Utils\VotoTypeEnum;
use App\Voto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotoController extends Controller
{
    use VotoTrait;

    public function like(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if (isset($input['idPhoto'])) {
            if ($this->checkVotoExist(VotoTypeEnum::LIKE, $user->id, $input['idPhoto'])) {
                $this->removeVoto($user->id, $input['idPhoto']);
            } else {
                $this->saveVoto(VotoTypeEnum::LIKE, $user->id, $input['idPhoto']);
            }
        }
        echo json_encode('OK');
    }

    public function unlike(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if (isset($input['idPhoto'])) {
            if ($this->checkVotoExist(VotoTypeEnum::UNLIKE, $user->id, $input['idPhoto'])) {
                $this->removeVoto($user->id, $input['idPhoto']);
            } else {
                $this->saveVoto(VotoTypeEnum::UNLIKE, $user->id, $input['idPhoto']);
            }
        }
        echo json_encode('OK');
    }

    /**
     * Verifica se per una data Photo esiste un voto di un dato Utente
     */
    public static function checkVotoExist($likeType, $idUtente, $idPhoto)
    {
        $count = Voto::where('idUtente', '=', $idUtente)
            ->where('idPhoto', '=', $idPhoto)
            ->where('like', '=', $likeType)
            ->count();
        return $count > 0 ? true : false;
    }

}