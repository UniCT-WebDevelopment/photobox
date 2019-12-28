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
                refreshVotoLike(idPhoto)
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
                refreshVotoUnlike(idPhoto)
            } else if (res == 'E') {
                console.log('Errore');
            }
        }
    });
}

function refreshVotoLike(idPhoto) {
    let $likeElement = $('#photoId_' + idPhoto + ' .like');
    let $votoLikeElement = $('#photoId_' + idPhoto + ' .like .voto');

    let $unlikeElement = $('#photoId_' + idPhoto + ' .unlike');
    let $votoUnlikeElement = $('#photoId_' + idPhoto + ' .unlike .voto');

    let votoLike = parseInt($votoLikeElement.text().trim());
    let votoUnlike = parseInt($votoUnlikeElement.text().trim());

    if ($unlikeElement.hasClass('unlike-active')) {
        // Rimuovi voto unlike
        votoUnlike--;
        $unlikeElement.removeClass('unlike-active');
        $votoUnlikeElement.text(votoUnlike);
    }

    if ($likeElement.hasClass('like-active')) {
        // Rimuovi voto like
        votoLike--;
        $likeElement.removeClass('like-active');
    } else {
        // Aggiungi voto like
        votoLike++;
        $likeElement.addClass('like-active');
    }
    $votoLikeElement.text(votoLike);
}

function refreshVotoUnlike(idPhoto) {
    let $likeElement = $('#photoId_' + idPhoto + ' .like');
    let $votoLikeElement = $('#photoId_' + idPhoto + ' .like .voto');

    let $unlikeElement = $('#photoId_' + idPhoto + ' .unlike');
    let $votoUnlikeElement = $('#photoId_' + idPhoto + ' .unlike .voto');

    let votoLike = parseInt($votoLikeElement.text().trim());
    let votoUnlike = parseInt($votoUnlikeElement.text().trim());

    if ($likeElement.hasClass('like-active')) {
        // Rimuovi voto like
        votoLike--;
        $likeElement.removeClass('like-active');
        $votoLikeElement.text(votoLike);
    }

    if ($unlikeElement.hasClass('unlike-active')) {
        // Rimuovi voto unlike
        votoUnlike--;
        $unlikeElement.removeClass('unlike-active');
    } else {
        // Aggiungi voto unlike
        votoUnlike++;
        $unlikeElement.addClass('unlike-active');
    }
    $votoUnlikeElement.text(votoUnlike);
}