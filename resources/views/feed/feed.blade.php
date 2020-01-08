@extends('layout', ['user' => $user, 'page' => 'H'])

@section('content')
<div class="row">
    <div class="col-sm-2">
        <h1>Bacheca</h1>
    </div>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4 col-md-6">
        @component('component.searchUserComponent')@endcomponent
    </div>
</div>
@component('component.feedPhotoComponent', ['user' => $user, 'listaPhoto' => $listaPhoto, 'page' => 'H']) @endcomponent
@endsection