<?php

namespace App\Http\Controllers;

use App\Http\Traits\VotoTrait;
use App\Photo;
use App\Utils\VotoTypeEnum;
use App\Voto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotoController extends Controller
{
    use VotoTrait;

    /**
     * Permette ad un utente di mettere un like ad una foto,
     * di rimuovere il proprio voto se gia' esiste o di cambiare voto
     *
     * @param Request
     * @return JSON
     */
    public function like(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if (isset($input['idPhoto'])) {
            if ($this->checkVotoExist(VotoTypeEnum::LIKE, $user->id, $input['idPhoto'])) {
                // Rimozione voto
                $this->removeVoto($user->id, $input['idPhoto']);
            } else if ($this->checkVotoExist(VotoTypeEnum::UNLIKE, $user->id, $input['idPhoto'])) {
                // Cambio tipo voto
                $this->changeVoto(VotoTypeEnum::LIKE, $user->id, $input['idPhoto']);
            } else {
                // Aggiungo nuovo voto
                $this->saveVoto(VotoTypeEnum::LIKE, $user->id, $input['idPhoto']);
            }
        }
        echo json_encode('OK');
    }

    /**
     * Permette ad un utente di mettere un unlike ad una foto,
     * di rimuovere il proprio voto se gia' esiste o di cambiare voto
     *
     * @param Request
     * @return JSON
     */
    public function unlike(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if (isset($input['idPhoto'])) {
            if ($this->checkVotoExist(VotoTypeEnum::UNLIKE, $user->id, $input['idPhoto'])) {
                // Rimozione voto
                $this->removeVoto($user->id, $input['idPhoto']);
            } else if ($this->checkVotoExist(VotoTypeEnum::LIKE, $user->id, $input['idPhoto'])) {
                // Cambio tipo voto
                $this->changeVoto(VotoTypeEnum::UNLIKE, $user->id, $input['idPhoto']);
            } else {
                $this->saveVoto(VotoTypeEnum::UNLIKE, $user->id, $input['idPhoto']);
            }
        }
        echo json_encode('OK');
    }

    /**
     * Verifica se per una data Photo esiste un Voto di un dato Utente
     *
     * @param Int
     * @param Int
     * @param Int
     * @return Boolean
     */
    public static function checkVotoExist($likeType, $idUtente, $idPhoto)
    {
        $count = Voto::where('idUtente', $idUtente)
            ->where('idPhoto', $idPhoto)
            ->where('like', $likeType)
            ->count();
        return $count > 0 ? true : false;
    }

    /**
     * Calcola l'andamento dei voti
     *
     * @param Void
     * @return JSON
     */
    public function getMediaVoti()
    {
        $voti = $this->getSumVotiPerMese(Auth::user());
        $response = $this->prepareResponse($voti);
        echo json_encode($response);
    }
}