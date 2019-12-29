<?php

namespace App\Http\Controllers;

use App\Http\Traits\VotoTrait;
use App\Photo;
use App\Utils\VotoTypeEnum;
use App\Voto;
use Carbon\Carbon;
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

    public function getMediaVoti()
    {
        $user = Auth::user();
        $now = Carbon::now();

        $ph = $user->photos()->pluck('id')->toArray();

        $voti = Voto::selectRaw('EXTRACT(month from dataVoto) AS Mese, SUM(voti.like) AS MediaVoto')
            ->whereIn('idPhoto', $ph)
            ->whereYear('dataVoto', $now->year)
            ->orderBy('Mese')
            ->groupBy('Mese')
            ->get()
            ->toArray();

        $response = array();
        for ($key = 1; $key <= 12; $key++) {
            $response[$key] = '0';
        }

        foreach ($voti as $voto) {
            $response[$voto['Mese']] = $voto['MediaVoto'];
        }

        echo json_encode($response);
    }

    public function getTrendVoti()
    {
        $user = Auth::user();

    }

}