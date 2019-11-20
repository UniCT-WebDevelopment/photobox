@extends('layout', ['user' => $user, 'page' => 'P'])

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <h1>Profilo</h1>
    <h6><strong>Nome</strong>: {{ $user->nome }}</h6>
    <h6><strong>Cognome</strong>: {{ $user->cognome }}</h6>
    <h6><strong>Username</strong>: {{ $user->nickname }}</h6>
    <h6><strong>Email</strong>: {{ $user->email }}</h6>
    <h6><strong>Data di Nascita</strong>: {{ date('d-m-Y', strtotime($user->dataNascita)) }}</h6>
    <h6><strong>Biografia</strong>: {{ $user->bio }}</h6>
   
    <div class="section_content mt30">
        <a href="/editProfileInfo" class="btn btn-primary-outline">Modifica Profilo</a>
        <a href="/editProfilePhoto" class="btn btn-primary-outline">Cambia Foto</a>
    </div>

    <div class="section_content mt30">
        <h4>Statistiche Foto</h4>
    <div>
        <div style="display: inline-block; ">
            <canvas id="myChart" width="500" height="250"></canvas>
            <span class="photo-description">
                Grafico a linea arancione che racconta il trend dei voti
            </span>
        </div>

        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                    datasets: [{
                        label: 'Media voti per mese',
                        backgroundColor: 'rgba(254,152,81,0.2)',
                        borderColor: 'rgba(254,152,81,1)',
                        borderWidth: 2,
                        data: [10, 25, -5, 2, 17, -15, 10, 4, -9, -5, 10, 8]
                    }]
                },

                options: {
                    responsive: true,
                    legend: false,
                    title: {
                        display: true,
                        text: 'Grafico Linea'
                    }
                }
            });
        </script>


        <div style="display: inline-block;">
            <canvas  id="myChart2" width="500" height="250"></canvas>
            <span class="photo-description">
                Grafico a barre che evidenzia in rosso/verde i valori negativi/positivi
            </span>
        </div>
        <script>

            //var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            //var color = Chart.helpers.color;
            var myColorBackground = [];
            var myColorBorder = [];
            var myData = [10, 25, -5, 2, 17, -15, -10, 4, -9, -5, 10, -8];

            for(i=0;i<myData.length;i++){
                console.log(myData[i]);
                if(myData[i]>=0){
                    myColorBackground[i]="rgba(85,158,91,0.2)";
                    myColorBorder[i] = "rgba(85,158,91,1)";
                }
                else {
                    myColorBackground[i]="rgba(158,14,30,0.2)";
                    myColorBorder[i] = "rgba(158,14,30,1)";
                }
            }

            var barChartData = {
                labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                datasets: [{
                    label: 'Media voti per mese',
                    //backgroundColor: 'rgba(85,158,91,0.2)',
                    backgroundColor: myColorBackground,
                    //borderColor: 'rgba(85,158,91,1)',
                    borderColor: myColorBorder,
                    borderWidth: 1,
                    data: myData
                }]
            };

            var ctx = document.getElementById('myChart2').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: false,
                    title: {
                        display: true,
                        text: 'Grafico Barre'
                    }
                }
            });


            myBar.update();
        </script>



        <div style="display: inline-block;" >
            <canvas id="myChart3" width="500" height="250"></canvas>
            <span class="photo-description">
                Grafico a torta per il count dei dispositivi utilizzati per scattare
            </span>
        </div>
        <script>

            var ctx = document.getElementById('myChart3').getContext('2d');
            window.myPie = new Chart(ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [2, 12, 9, 5, 7, 8],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        label: 'Dataset'
                    }],
                    labels: [
                        'GoPRO',
                        'iPhone',
                        'LG',
                        'Samsung',
                        'Canon',
                        'NA'
                    ]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'right',
                    },
                    title: {
                        display: true,
                        text: 'Grafico torta'
                    }
                }
            });

        </script>

        <div style="display: block;" >
            <canvas id="myChart4" width="500" height="250"></canvas>
            <span class="photo-description">
                Grafico radiale simile a quello a torta
            </span>
        </div>
        <script>
            var config = {
                data: {
                    datasets: [{
                        data: [2, 12, 9, 5, 7, 8],
                        backgroundColor: [
                            'rgba(255, 99, 132,0.3)',
                            'rgba(255, 159, 64,0.3)',
                            'rgba(255, 205, 86,0.3)',
                            'rgba(75, 192, 192,0.3)',
                            'rgba(54, 162, 235,0.3)',
                            'rgba(153, 102, 255,0.3)',
                            'rgba(201, 203, 207,0.3)'
                        ],
                        label: 'Dispositivi utilizzati'
                    }],
                    labels: [
                        'GoPRO',
                        'iPhone',
                        'LG',
                        'Samsung',
                        'Canon',
                        'NA'
                    ]
                },
                options: {
                    responsive: false,
                    legend: {
                        position: 'right',
                    },
                    title: {
                        display: true,
                        text: 'Grafico Polare'
                    },
                    scale: {
                        ticks: {
                            beginAtZero: true
                        },
                        reverse: false
                    },
                    animation: {
                        animateRotate: true,
                        animateScale: true
                    }
                }
            };

            var ctx = document.getElementById('myChart4').getContext('2d');
                window.myPolarArea = Chart.PolarArea(ctx, config);

        </script>
@endsection