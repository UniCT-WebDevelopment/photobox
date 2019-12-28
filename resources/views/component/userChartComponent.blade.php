<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<div class="section_content mt50">
    <h4>Statistiche Foto</h4>
    <div>
        <div style="display: inline-block; ">
            <canvas id="myChart" width="500" height="250"></canvas>
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


        <div style="display: inline-block;">
            <canvas id="myChart2" width="500" height="250"></canvas>
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
                        text: 'Voti Positivi/Negativi'
                    }
                }
            });

            myBar.update();
        </script>
    </div>
</div>