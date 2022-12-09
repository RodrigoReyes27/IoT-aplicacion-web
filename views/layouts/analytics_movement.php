<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
const movementAside = document.querySelector(".movement");
const dashboardAside = document.querySelector(".dashboard");

movementAside.classList.add("active"); 
dashboardAside.classList.remove("active");

google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
              ['Hora', 'Activaciones', {role: 'annotation'}, {role: 'style'}],
              <?php
                echo "['6-9'," . intval($countMovement[0]['count']) . ", " . intval($countMovement[0]['count']) . ", 'color: #7380ec'],";
                echo "['9-14'," . intval($countMovement[1]['count']) . ", " . intval($countMovement[1]['count']) . ", 'color: #7380ec'],";
                echo "['14-17'," . intval($countMovement[2]['count']) . ", " . intval($countMovement[2]['count']) . ", 'color: #7380ec'],";
                echo "['17-20'," . intval($countMovement[3]['count']) . ", " . intval($countMovement[3]['count']) . ", 'color: #7380ec'],";
                echo "['20-24'," . intval($countMovement[4]['count']) . ", " . intval($countMovement[4]['count']) . ", 'color: #7380ec'],";
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

<p style ="display:none" class="ventilador" value=<?php echo $counterVentilador[0]['count'];?>></p>
<p style ="display:none" class="placa" value=<?php echo $counterPlaca[0]['count'];?>></p>

<main>
        <h1>Analiticas Movimiento</h1>

        <div class="date">
          <input type="date" />
        </div>

        
        <div class="recent-orders">
          <h2>Movimiento en la calle durante el Día</h2>
          <table>
            <tr>
              <td>
                <div id="column" style="width: 900px; height: 500px; margin: auto;"></div>
              </td>
            </tr>
          </table>
        </div>

        <div class="recent-orders">
          <h2>Ultimos registros de Movimiento</h2>
          <table id="recent-orders--table">
            <thead>
              <tr>
                <th>Id </th>
                <th>Hora</th>
                <th>Movimiento</th>
                <th>Id parada</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($movements as $movement):?>
            <tr>
              <td class="primary"><?php echo $movement['log_id']?></td>
              <td><?php echo $movement['log_date']?></td>
              <?php if ($movement['lectura'] == 0): ?>
                <td class="${row.statusColor}">No hay Movimiento</td>
              <?php else: ?>
                <td class="${row.statusColor}">Hay Movimiento</td>
              <?php endif; ?>
              <td><?php echo $movement['semaforo_id']?></td>

              
            </tr>
            <?php endforeach; ?>
            </tbody>
            


          </table>
          <a href="#">Show All</a>
        </div>
      </main>