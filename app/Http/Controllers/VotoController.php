<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\VotoTrait;
use App\Utils\VotoTypeEnum;

class VotoController extends Controller {
    use VotoTrait;

    public function like(Request $request) {
        $input = $request->all();
        $user = Auth::user();
        $this->saveVoto(VotoTypeEnum::LIKE, $user->id, $input['idPhoto']);
        echo json_encode('OK');
    }

    public function unlike() {
        $input = $request->all();
        $user = Auth::user();
        $this->saveVoto(VotoTypeEnum::UNLIKE, $user->id, $input['idPhoto']);
        echo json_encode('OK');
    }
}