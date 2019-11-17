<?php
namespace App\Http\Traits;

use App\Voto;
use Carbon\Carbon;

trait VotoTrait {
    public function saveVoto($likeType, $idUtente, $idPhoto) {
        $voto = new Voto;
        $voto->dataVoto = Carbon::now();
        $voto->like = $likeType;
        $voto->idUtente = $idUtente;
        $voto->idPhoto = $idPhoto;
        $voto->save();
        return;
    }
}