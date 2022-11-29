<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
const lightAside = document.querySelector(".light");
const dashboardAside = document.querySelector(".dashboard");

lightAside.classList.add("active"); 
dashboardAside.classList.remove("active");

google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        // PIE CHART
        var data = google.visualization.arrayToDataTable([
          ['Encendido', 'Porcentaje'],
          <?php
              echo "['No encendido'," . $movementByTime[0]['count'] . "],";
              echo "['Encendido'," . $movementByTime[1]['count'] . "]";
          ?>
        ]);

        var options = {
          backgroundColor: 'transparent',
          pieHole: 0.4,
          legend: 'none',
        };

        // COLUMN CHART

        var pieChart = new google.visualization.PieChart(document.getElementById('donutchart'));
        pieChart.draw(data, options);

        var data = google.visualization.arrayToDataTable([
              ['Hora', 'Activaciones', {role: 'annotation'}, {role: 'style'}],
              <?php
                echo "['6-9'," . intval($countMovement[0]['count']) . ", " . intval($countMovement[0]['count']) . ", 'color: #7380ec'],";
                echo "['9-14'," . intval($countMovement[1]['count']) . ", " . intval($countMovement[1]['count']) . ", 'color: #7380ec'],";
                echo "['14-17'," . intval($countMovement[2]['count']) . ", " . intval($countMovement[2]['count']) . ", 'color: #7380ec'],";
                echo "['17-20'," . intval($countMovement[3]['count']) . ", " . intval($countMovement[3]['count']) . ", 'color: #7380ec'],";
                echo "['20-23'," . intval($countMovement[4]['count']) . ", " . intval($countMovement[4]['count']) . ", 'color: #7380ec'],";
              ?>
            ]);

            var options = {
              legend: 'none',
              backgroundColor: 'transparent',
              vAxis:{
                baselineColor: '#7d8da1',
                gridlineColor: '#7d8da1',
                textStyle: {
                  color: '#7d8da1'
                },
                viewWindowMode: 'explicit',
                viewWindow: {
                  max: 120,
                  min: 0
                },
                isStacked: true
              },
              hAxis: {
                textStyle: {
                  color: '#7d8da1'
                }
              }
            }; 

            // Instantiate and draw the chart.
            var column = new google.visualization.ColumnChart(document.getElementById('column'));
            column.draw(data, options);
}
</script>

<main>
        <h1>Analiticas Fotorresistor</h1>

        <div class="date">
          <input type="date" />
        </div>

        <div class="insights">
          <!-- SALES -->
          <!-- <div class="sales">
            <div id="donutchart" style="width: 150px; height: 150px;"></div>
            <small class="text-muted"> Last 24 hours </small>
          </div> -->
          <div class="sales">
            <span class="material-icons-sharp"> analytics </span>
            <h3># Veces de Movimiento detectado durante el dia</h3>
            <h1><?php echo $movementByTime[0]['count']?></h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>

          <!-- EXPENSES -->
          <div class="expenses">
            <span class="material-icons-sharp"> bar_chart </span>
            <h3># Veces de Movimiento detectado durante la noche</h3>
            <h1><?php echo $movementByTime[1]['count']?></h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>

          <!-- INCOME -->
          <div class="income">
          <h3>Porcentaje de activación de Luces</h3>
            <div id="donutchart" style="height:200px; width:200px; padding:40px; margin: -50px 0px -65px;"></div>
            <small class="text-muted" style="margin-bottom: -20px;">Azul: NO encendido  Rojo: Encendido</small>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>
        </div>

        <div class="recent-orders">
          <h2>Uso durante el Día</h2>
          <table>
            <tr>
              <td>
                <div id="column" style="width: 900px; height: 500px; margin: auto;"></div>
              </td>
            </tr>
          </table>
        </div>

        <div class="recent-orders">
          <h2>Ultimos registros de Fotorresistor</h2>
          <table id="recent-orders--table">
            <thead>
              <tr>
                <th>Id </th>
                <th>Hora</th>
                <th>Movimiento</th>
                <th>Luminosidad</th>
                <th>Id banqueta</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($lights as $light):?>
            <tr>
              <td class="primary"><?php echo $light['log_id']?></td>
              <td><?php echo $light['log_date']?></td>
              
              <?php if ($light['lectura_movimiento'] == 0): ?>
                <td class="${row.statusColor}">No hay Movimiento</td>
              <?php else: ?>
                <td class="${row.statusColor}">Hay Movimiento</td>
              <?php endif; ?>

              <td><?php echo $light['lectura_fotoresistor']?></td>
              <td><?php echo $light['banqueta_id']?></td>
              
            </tr>
            <?php endforeach; ?>
            </tbody>
            


          </table>
          <a href="#">Show All</a>
        </div>
      </main>