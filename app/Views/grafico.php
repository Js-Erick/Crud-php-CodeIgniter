<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"
     integrity="sha512-U3hGSfg6tQWADDQL2TUZwdVSVDxUt2HZ6IMEIskuBizSDzoe65K3ZwEybo0JOcEjZWtWY3OJzouhmlGop+/dBg==" 
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"
     integrity="sha512-U3hGSfg6tQWADDQL2TUZwdVSVDxUt2HZ6IMEIskuBizSDzoe65K3ZwEybo0JOcEjZWtWY3OJzouhmlGop+/dBg==" 
     crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="navbar-brand active" aria-current="page" href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="navbar-brand active" href="/indicadores">CRUD</a>
        </li>
        <li class="nav-item">
          <a class="navbar-brand active" href="/grafico">Grafico</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
   
<body onload="grafico()">

<canvas id="myChart" width="400" height="150"></canvas>
<script>

var paramValores = [];
var paramFechas = [];

<?php
foreach($datos as $row){
   $valorIndicador = [];
   $valorIndicador = $row['valorIndicador'];
   //echo "valor = [];";
   //echo "var valor ='$valorIndicador';";

   $fechaIndicador = [];
   $fechaIndicador = $row['fechaIndicador'];
   //echo "fecha = [];";
   //echo "fecha ='$fechaIndicador';";

   //echo "window.console&&console.log($valorIndicador);";
   //echo "window.console&&console.log(fecha);";

   echo "paramValores.push(" . $valorIndicador . ");";
   echo "paramFechas.push(" . $fechaIndicador . ");";
 
}

    echo "window.console&&console.log(paramValores);";
    echo "window.console&&console.log(paramFechas);";

?>

//$('#btnBuscar').click(function(){
function grafico() {
    paramFechas.sort();

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, { 
        type: 'line',
        data: {
            labels: paramFechas,
            datasets: [{
                label: 'Grafico',
                fill: false,
                lineTension: 0.5,
                data:paramValores ,
                backgroundColor:'rgba(255, 99, 132, 0.2)',             
                borderColor:'rgba(255, 99, 132, 1)',
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',			            
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 7,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 5,
                pointRadius: 1,
                pointHitRadius: 10,
                spanGaps: false,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
//});
};





/*var myChart = new Chart(ctx, { 
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});*/
</script>
</body>
</html>
