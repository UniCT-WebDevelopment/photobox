<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="js/cocoon/function.js"></script>
<script src="js/cocoon/jquery.min.js"></script>

<div class="section_content mt50">
    <h4>Statistiche Foto</h4>
    <div>
        <div style="display: inline-block; ">
            <canvas id="myChart" width="500" height="250"></canvas>
        </div>
        <div style="display: inline-block;">
            <canvas id="myChart2" width="500" height="250"></canvas>
        </div>

        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                    datasets: [{
                        label: 'Media voti',
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
                        text: 'Trend dei Voti'
                    }
                }
            });
        </script>

        <script>
            getMediaVoti();
        </script>
    </div>
</div>