<div class="row">
@foreach ($listaPhoto as $photo)
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
        <div class="photo-container">
            <div class="row photo-user">
                <div class="col-md-7">{{ $user->nickname }}</div>
                <div class="col-md-5 text-right">{{ date('d-m-Y', strtotime($photo->dataCaricamento)) }}</div>
            </div>
            <div class="photo-border"></div>
            <img class="img-fluid" src="storage/users/feed/{{ $user->id }}/{{ $photo->nome }}">
            <div class="photo-icons">
                <div class="row">
                    <div class="col-md-4">
                        <i class="fa fa-thumbs-up"></i>&nbsp;+1
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-thumbs-down"></i>&nbsp;-1
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Map
                    </div>
                </div>
            </div>
            <div class="photo-container-description">
                <span class="photo-description">{{ $photo->descrizione }}</span>
            </div>
        </div>
    </div>
@endforeach
</div>