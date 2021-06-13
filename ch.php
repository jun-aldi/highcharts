<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Curah Hujan</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Tinggi Muka Air</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ch.php">Curah Hujan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kekeruhan.php">Kekeruhan Air</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="challenge.php">challenge</a>
      </li>
    </ul>
  </div>
</nav>
<main>
    <div class="container-fluid mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Grafik Curah Hujam</h5>
                        <hr>
                        <div id="grafik"></div>
                        <?php
                            include 'koneksi.php';
                            $query = "SELECT * FROM ch ";
                            $ch = mysqli_query($koneksi, $query);
                            $data=array();
                            while($row = mysqli_fetch_array($ch))
                            {
                                array_push($data, "['".$row['waktu']."',".$row['nilai']."]");
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script type="text/javascript">
    Highcharts.chart('grafik', {
    chart: {
    type: 'column',
    zoomType: 'xy'
    },
    title: {
    text: 'Curah Hujan'
    },
    colors: ['#9400D3'],
    subtitle: {
    text: 'Latihan Highcharts'
    },  
    yAxis: {
    title: {
    text: 'Curah hujan per menit'
    },
    reversed: true
    },
    xAxis: {
    type: 'category', 
    accessibility: {
    rangeDescription: 'Waktu'
    }
    },
    tooltip: {
    pointFormat: '{point.y} mm'
    },
    legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
    },
    plotOptions: {
    column: {
    pointPadding: 0.1
    }, },
    series: [{
    name: 'Curah Hujan',
    data: [<?= join(',', $data) ?>]
    }],
    responsive: {
    rules: [{
    condition: {
    maxWidth: 500
    },
    chartOptions: {
    legend: {
    layout: 'horizontal',
    align: 'center',
    verticalAlign: 'bottom'
    }
    }
    }]
    }
    });
</script>
</script>
  </body>

</html>