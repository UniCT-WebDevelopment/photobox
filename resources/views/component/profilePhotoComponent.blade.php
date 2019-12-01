<div id="colorlib-aside" class="logo_box">
    <h1 id="colorlib-logo">
        {{-- @yield('photoProfile') --}}
        @if(!empty($user->imgProfilo))
            <span class="img" style="background-image: url(storage/users/profile/{{$user->id}}/{{$user->imgProfilo}});"></span>
        @else 
            <span class="img" style="background-image: url(images/users/default.png);"></span>
        @endif
        <a href="/profile">{{$user->nome}} {{$user->cognome}}</a>
    </h1>
</div>