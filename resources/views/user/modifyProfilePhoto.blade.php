@extends('layout')

@section('nome_utente')
    {{ $user->nome }} {{ $user->cognome }}
@endsection

@section('content')

    <link href="css/cocoon/main.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i" rel="stylesheet">

    <div class="section_content mt30">
        <h3>Cambia foto profilo</h3>
    </div>

    <form id="upload" action="#" method="POST" enctype="multipart/form-data">

        <fieldset>

            <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

            <div>
                <div id="filedrag">
                    Trascina immmagine
                    <h5>(Formato file: JPG, JPEG, PNG)</h5>
                </div>

                <input type="file" class="btn btn-primary btn-file" id="fileselect" name="fileselect" title="Scegli immagine" accept=".jpg, .jpeg, .png"/>
                <label class="btn btn-primary" for="fileselect">oppure Carica Immagine</label>
                <div id="filename"></div>
            </div>
            <hr>
            <div id="submitbutton">
                <button type="submit" class="btn btn-primary">Upload Files</button>
            </div>

        </fieldset>

    </form>

    <script type="text/javascript" src="js/cocoon/dragDrop.js">
        console.log("File Not Found");
    </script>
@endsection