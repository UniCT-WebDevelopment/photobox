@extends('layout', ['user' => $user, 'page' => 'H'])

@section('content')
<div class="row">
    <div class="col-md-2">
        <h1>Bacheca</h1>
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-4">
        @component('component.searchUserComponent')@endcomponent
    </div>
</div>
@component('component.feedPhotoComponent', ['user' => $user, 'listaPhoto' => $listaPhoto, 'page' => 'H']) @endcomponent
@endsection