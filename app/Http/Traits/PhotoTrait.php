<?php
namespace App\Http\Traits;

use App\Photo;
use Carbon\Carbon;

trait PhotoTrait {
    public function savePhoto($fileName, $descrizione, $gps, $userId) {
        $photo = new Photo;
        $photo->nome = $fileName;
        $photo->descrizione = $descrizione;
        $photo->GPS = $gps;
        $photo->dataCaricamento = Carbon::now();
        $photo->idUtente = $userId;
        $photo->save();
        return;
    }
}