<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
const distanceAside = document.querySelector(".distance");
const dashboardAside = document.querySelector(".dashboard");

distanceAside.classList.add("active"); 
dashboardAside.classList.remove("active");

google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        // PIE CHART
        var data = google.visualization.arrayToDataTable([
          ['Distancia', 'Porcentaje'],
          <?php
            $alturaDesnivel = 15;

            if (intval($avgDistance[0]['promedioDistancia']) == 0) {
              $nivelAgua = 0;
            }
            else {
              $nivelAgua = $alturaDesnivel - floatval($avgDistance[0]['promedioDistancia']);
            }
            $nivelAguaPeligro = 9;

            if ($nivelAgua >= $nivelAguaPeligro) {
              echo "['Distancia para peligro', 0],";
              echo "['Nivel de Agua', 1]";  
            }
            else {
              echo "['Distancia para peligro'," . ($nivelAguaPeligro - $nivelAgua) . "],";
              echo "['Nivel de Agua'," . $nivelAgua . "]";
            }
          ?>
        ]);

        var options = {
          backgroundColor: 'transparent',
          pieHole: 0.4,
          legend: 'none',
        };

        var pieChart = new google.visualization.PieChart(document.getElementById('donutchart'));
        pieChart.draw(data, options);
}
</script>

<main>
        <h1>Analiticas Distancia</h1>

        <div class="date">
          <input type="date" />
        </div>

        <div class="insights">
    
          <div>
            <span class="material-icons-sharp"> analytics </span>
            <h3>Promedio Nivel de agua en desnivel</h3>
            <h1><?php echo substr($nivelAgua, 0 ,4)?></h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>

          <div class="expenses">
            <span class="material-icons-sharp"> analytics </span>
            <h3>Estatus de activación del Servomotor</h3>
            <?php if($distances[0]['distancia'] >= $nivelAguaPeligro):?>
              <h1>Activado</h1>
            <?php else: ?>
              <h1>No Activado</h1>
            <?php endif; ?>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>

          <div>
            <h3>Porcentaje de riesgo de inundaccion</h3>
            <div id="donutchart" style="height:200px; width:200px; padding:40px; margin: -50px 0px -65px;"></div>
            <small class="text-muted" style="margin-bottom: -20px;">Azul: Seguro  Rojo: Peligro</small>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>
          
        </div>

        <div class="recent-orders">
          <h2>Ultimos registros de Distancia</h2>
          <table id="recent-orders--table">
            <thead>
              <tr>
                <th>Id </th>
                <th>Hora</th>
                <th>Distancia</th>
                <th>Id parada</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($distances as $distance):?>
            <tr>
              <td class="primary"><?php echo $distance['log_id']?></td>
              <td><?php echo $distance['log_date']?></td>
              <td><?php echo $distance['distancia']?></td>
              <td><?php echo $distance['paso_desnivel_id']?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
          <a href="#">Show All</a>  
        </div>
      </main>