<div class="row">
    @foreach ($listaPhoto as $photo)
    @php
    $checkLike = App\Http\Controllers\VotoController::checkVotoExist('1', $user->id, $photo->id);
    $checkUnlike = App\Http\Controllers\VotoController::checkVotoExist('-1', $user->id, $photo->id);
    @endphp
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
        <div class="photo-container">
            <div class="row photo-user">
                <div class="col-md-7">{{ $photo->users->nickname }}</div>
                <div class="col-md-5 text-right">{{ date('d-m-Y', strtotime($photo->dataCaricamento)) }}</div>
            </div>
            <div class="photo-border"></div>
            <img class="img-responsive" src="storage/users/feed/{{ $photo->users->id }}/{{ $photo->nome }}">
            <div class="photo-icons">
                <div class="row">
                    <div class="col-md-4">
                        <a class="like @if($checkLike){{"like-active"}}@endif" onclick="like({{ $photo->id }})">
                            <i class="fa fa-thumbs-up"></i>&nbsp; {{ $photo->like }}
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="unlike @if($checkUnlike){{"unlike-active"}}@endif" onclick="unlike({{ $photo->id }})">
                            <i class="fa fa-thumbs-down"></i>&nbsp; {{ $photo->unlike }}
                        </a>
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Map
                    </div>
                </div>
            </div>
            <div class="photo-container-description">
                <span class="photo-description">{{ $photo->descrizione }}</span>
            </div>
            @if($photo->users->id == $user->id && $page == 'M')
            <div class="photo-container-btn-delete">
                <a href="/deletePhoto?{{ $photo->id }}" class="btn btn-primary-outline">Cancella Foto</a>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>