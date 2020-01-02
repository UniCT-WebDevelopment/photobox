<div id="colorlib-aside" class="logo_box">
    <a href="/profile">
        <h1 id="colorlib-logo">
            @if(!empty($user->imgProfilo))
            <span class="img"
                style="background-image: url(storage/users/profile/{{$user->id}}/{{$user->imgProfilo}});"></span>
            @else
            <span class="img" style="background-image: url(images/users/default.png);"></span>
            @endif
            {{$user->nome}} {{$user->cognome}}
        </h1>
    </a>
</div>