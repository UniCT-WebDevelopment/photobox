<?php
namespace App\Http\Traits;

use App\Photo;
use App\Utils\VotoTypeEnum;
use App\Voto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

trait PhotoTrait
{
    public function savePhoto($fileName, $descrizione, $userId)
    {
        $photo = new Photo;
        $photo->nome = $fileName;
        $photo->descrizione = $descrizione;
        $photo->dataCaricamento = Carbon::now();
        $photo->idUtente = $userId;
        $photo->save();
        return;
    }

    public function calcLikeAndUnlike($listaPhoto)
    {
        foreach ($listaPhoto as &$photo) {
            $likeCounter = $this->getLikeByIdPhoto($photo->id);
            $unlikeCounter = $this->getUnlikeByIdPhoto($photo->id);
            $photo->setLike($likeCounter);
            $photo->setUnlike($unlikeCounter);
        }
        return $listaPhoto;
    }

    public function getLikeByIdPhoto($id)
    {
        return Voto::where('idPhoto', $id)->where('like', VotoTypeEnum::LIKE)->count();
    }

    public function getUnlikeByIdPhoto($id)
    {
        return Voto::where('idPhoto', $id)->where('like', VotoTypeEnum::UNLIKE)->count();
    }

    private function deleteProfilePhoto($user)
    {
        $directory = 'public/users/profile/' . $user->id;
        Storage::deleteDirectory($directory);
    }

    private function deleteAllFeedPhoto($user)
    {
        $directory = '/public/users/feed/' . $user->id;
        Storage::deleteDirectory($directory);
    }

}