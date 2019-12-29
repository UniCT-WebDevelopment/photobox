<?php
namespace App\Http\Traits;

use App\Voto;
use Carbon\Carbon;

trait VotoTrait
{
    /**
     * Inserisce una entry a DB nella tabella Voto
     */
    public function saveVoto($likeType, $idUtente, $idPhoto)
    {
        $voto = new Voto;
        $voto->dataVoto = Carbon::now();
        $voto->like = $likeType;
        $voto->idUtente = $idUtente;
        $voto->idPhoto = $idPhoto;
        $voto->save();
    }

    /**
     * Rimuove la entry a DB nella tabella Voto
     */
    public function removeVoto($idUtente, $idPhoto)
    {
        Voto::where('idUtente', $idUtente)
            ->where('idPhoto', $idPhoto)
            ->delete();
    }

    /**
     * Modifica la entry a DB nella tabella Voto
     */
    public function changeVoto($likeType, $idUtente, $idPhoto)
    {
        $voto = Voto::where('idUtente', $idUtente)
            ->where('idPhoto', $idPhoto)->first();
        $voto->like = $likeType;
        $voto->save();
    }

    public function getSumVotiPerMese($user)
    {
        $ph = $user->photos()->pluck('id')->toArray();
        return Voto::selectRaw('EXTRACT(month from dataVoto) AS Mese, SUM(voti.like) AS MediaVoto')
            ->whereIn('idPhoto', $ph)
            ->whereYear('dataVoto', Carbon::now()->year)
            ->orderBy('Mese')
            ->groupBy('Mese')
            ->get()
            ->toArray();
    }

    public function prepareResponse($voti)
    {
        $response = array();
        for ($key = 1; $key <= 12; $key++) {
            $response[$key] = '0';
        }
        foreach ($voti as $voto) {
            $response[$voto['Mese']] = $voto['MediaVoto'];
        }
        return $response;
    }
}