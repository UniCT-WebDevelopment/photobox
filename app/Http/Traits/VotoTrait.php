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
}