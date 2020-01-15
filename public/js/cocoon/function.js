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

function getMediaVoti() {
    $.ajax({
        url: '/mediaVoti',
        dataType: 'json',
        type: 'GET',
        success: function(res) {
            populateChartMediaVoti(res);
        }
    });
}

function getTrendPost() {
    $.ajax({
        url: '/trendPost',
        dataType: 'json',
        type: 'GET',
        success: function(res) {
            populateChartTrendPost(res);
        }
    });
}

function populateChartMediaVoti(data) {
    var myColorBackground = [];
    var myColorBorder = [];

    var result = [];
    for (var i in data)
        result.push([data[i]]);

    for (i = 0; i < result.length; i++) {
        if (result[i] >= 0) {
            myColorBackground[i] = "rgba(85,158,91,0.2)";
            myColorBorder[i] = "rgba(85,158,91,1)";
        } else {
            myColorBackground[i] = "rgba(158,14,30,0.2)";
            myColorBorder[i] = "rgba(158,14,30,1)";
        }
    }

    var barChartData = {
        labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
        datasets: [{
            label: 'Media voti per mese',
            backgroundColor: myColorBackground,
            borderColor: myColorBorder,
            borderWidth: 1,
            data: result
        }]
    };

    var ctx = document.getElementById('chartVoti').getContext('2d');
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            legend: false,
            title: {
                display: true,
                text: 'Media Voti Positivi/Negativi'
            }
        }
    });
    myBar.update();
}

function populateChartTrendPost(dataRes) {
    var result = [];
    for (var i in dataRes) {
        result.push([dataRes[i]]);
    }

    var ctx = document.getElementById('chartPost').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
            datasets: [{
                label: 'Trand Post',
                backgroundColor: 'rgba(254,152,81,0.2)',
                borderColor: 'rgba(254,152,81,1)',
                borderWidth: 2,
                data: result
            }]
        },

        options: {
            responsive: true,
            legend: false,
            title: {
                display: true,
                text: 'Trend dei Post'
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