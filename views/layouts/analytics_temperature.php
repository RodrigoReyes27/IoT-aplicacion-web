<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
const tempAside = document.querySelector(".temperature");
const dashboardAside = document.querySelector(".dashboard");

tempAside.classList.add("active"); 
dashboardAside.classList.remove("active");

google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        // PIE CHART
        var data = google.visualization.arrayToDataTable([
          ['Actuador', 'Veces Activado'],
          <?php
            echo "['Ventilador'," . intval($counterVentilador[0]['count']) . "],";
            echo "['Placa Termica'," . intval($counterPlaca[0]['count']) . "]";
          ?>
        ]);

        var options = {
          backgroundColor: 'transparent',
          pieHole: 0.4,
          legend: 'none',
        };

        var pieChart = new google.visualization.PieChart(document.getElementById('donutchart'));
        pieChart.draw(data, options);

        var data = google.visualization.arrayToDataTable([
              ['Hora', 'Activaciones', {role: 'annotation'}, {role: 'style'}],
              <?php
                echo "['6-9'," . intval($countTiempo[0]['count']) . ", " . intval($countTiempo[0]['count']) . ", 'color: #7380ec'],";
                echo "['9-14'," . intval($countTiempo[1]['count']) . ", " . intval($countTiempo[1]['count']) . ", 'color: #7380ec'],";
                echo "['14-17'," . intval($countTiempo[2]['count']) . ", " . intval($countTiempo[2]['count']) . ", 'color: #7380ec'],";
                echo "['17-20'," . intval($countTiempo[3]['count']) . ", " . intval($countTiempo[3]['count']) . ", 'color: #7380ec'],";
                echo "['20-23'," . intval($countTiempo[4]['count']) . ", " . intval($countTiempo[4]['count']) . ", 'color: #7380ec'],";
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
                  max: 15,
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
        <h1>Analiticas Temperatura</h1>

        <div class="date">
          <input type="date" />
        </div>
        
        <div class="insights">
          
          <div class="sales">
            <span class="material-icons-sharp"> analytics </span>
            <h3># Veces activado el Ventilador</h3>
            <h1><?php echo $counterVentilador[0]['count']; ?></h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>

          <div class="expenses">
            <span class="material-icons-sharp"> bar_chart </span>
            <h3># Veces activada la Placa Termica</h3>
            <h1><?php echo $counterPlaca[0]['count']; ?></h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>

          <div>
            <h3>Porcentaje Uso de Actuadores</h3>
            <div id="donutchart" style="height:200px; width:200px; padding:40px; margin: -50px 0px -65px;"></div>
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
          <h2>Ultimos registros de Temperatura</h2>
          <table id="recent-orders--table">
            <thead>
              <tr>
                <th>Id </th>
                <th>Hora</th>
                <th>Temperatura</th>
                <th>Id parada</th>
                <th>Actuador Activado</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($temperatures as $temperature):?>
            <tr>
              <td class="primary"><?php echo $temperature['log_id']?></td>
              <td><?php echo $temperature['log_date']?></td>
              <td><?php echo $temperature['lectura']?></td>
              <td><?php echo $temperature['parada_id']?></td>
              <?php if ($temperature['lectura'] > 21): ?>
                <td class="${row.statusColor}">Ventilador</td>
              <?php else: ?>
                <td class="${row.statusColor}">Placa Termica</td>
              <?php endif; ?>
              
            </tr>
            <?php endforeach; ?>
            </tbody>
            


          </table>
          <a href="#">Show All</a>
        </div>
      </main>