$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function like(idPhoto) {
    $.ajax({
        url: '/like',
        dataType: 'json',
        data: { idPhoto: idPhoto },
        type: 'POST',
        success: function(res) {
            if (res == 'OK') {
                console.log('Like this');
                //window.location.href = "/myClient.php";
            } else if (res == 'E') {
                console.log('Errore');
            }
        }
    });
}

function unlike(idPhoto) {
    $.ajax({
        url: '/unlike',
        dataType: 'json',
        data: { idPhoto: idPhoto },
        type: 'POST',
        success: function(res) {
            if (res == 'OK') {
                console.log('Unlike this');
            } else if (res == 'E') {
                console.log('Errore');
            }
        }
    });
}