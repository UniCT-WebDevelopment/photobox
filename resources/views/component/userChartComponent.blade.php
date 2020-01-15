<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="js/cocoon/function.js"></script>
<script src="js/cocoon/jquery.min.js"></script>

<div class="section_content mt50">
    <h4>Statistiche Foto</h4>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6">
            <canvas id="chartPost"></canvas>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <canvas id="chartVoti"></canvas>
        </div>

        <script>
            getTrendPost();
            getMediaVoti();
        </script>
    </div>
</div>