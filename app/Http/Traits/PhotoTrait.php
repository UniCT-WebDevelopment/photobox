<?php
namespace App\Http\Traits;

use App\Photo;
use App\Voto;
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

    public function calcLikeAndUnlike($listaPhoto) {
        foreach($listaPhoto as &$photo) {
            $likeCounter = $this->getLikeByIdPhoto($photo->id);
            $unlikeCounter = $this->getUnlikeByIdPhoto($photo->id);
            $photo->setLike($likeCounter);
            $photo->setUnlike($unlikeCounter);
        }
        return $listaPhoto;
    }

    public function getLikeByIdPhoto($id) {
        return Voto::where('idPhoto', '=', $id)->where('like', '=', '1')->count();
    }

    public function getUnlikeByIdPhoto($id) {
        return Voto::where('idPhoto', '=', $id)->where('like', '=', '-1')->count();
    }
}