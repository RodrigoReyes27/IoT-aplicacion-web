<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
const buttonAside = document.querySelector(".button");
const dashboardAside = document.querySelector(".dashboard");

buttonAside.classList.add("active"); 
dashboardAside.classList.remove("active");

google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
              ['Hora', 'Activaciones', {role: 'annotation'}, {role: 'style'}],
              <?php
                echo "['6-9'," . intval($countButtonByTime[0]['count']) . ", " . intval($countButtonByTime[0]['count']) . ", 'color: #7380ec'],";
                echo "['9-14'," . intval($countButtonByTime[1]['count']) . ", " . intval($countButtonByTime[1]['count']) . ", 'color: #7380ec'],";
                echo "['14-17'," . intval($countButtonByTime[2]['count']) . ", " . intval($countButtonByTime[2]['count']) . ", 'color: #7380ec'],";
                echo "['17-20'," . intval($countButtonByTime[3]['count']) . ", " . intval($countButtonByTime[3]['count']) . ", 'color: #7380ec'],";
                echo "['20-24'," . intval($countButtonByTime[4]['count']) . ", " . intval($countButtonByTime[4]['count']) . ", 'color: #7380ec'],";
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
                  max: 40,
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
        <h1>Analiticas Boton</h1>

        <div class="date">
          <input type="date" />
        </div>

        <div class="insights">
          <!-- SALES -->
          <!-- <div class="sales">
            <div id="donutchart" style="width: 150px; height: 150px;"></div>
            <small class="text-muted"> Last 24 hours </small>
          </div> -->
          <div class="income">
            <span class="material-icons-sharp"> analytics </span>
            <h3># Veces que se altero el estado del semaforo</h3>
            <h1><?php echo $cantLogButton[0]['cantChange']?></h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>
          
        </div>

        <div class="recent-orders">
          <h2>Alteraciones durante el Día</h2>
          <table>
            <tr>
              <td>
                <div id="column" style="width: 900px; height: 500px; margin: auto;"></div>
              </td>
            </tr>
          </table>
        </div>

        <div class="recent-orders">
          <h2>Ultimos activaciones de Boton</h2>
          <table id="recent-orders--table">
            <thead>
              <tr>
                <th>Id </th>
                <th>Hora</th>
                <th>Id semaforo</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($buttons as $button):?>
            <tr>
              <td class="primary"><?php echo $button['log_id']?></td>
              <td><?php echo $button['log_date']?></td>
              <td><?php echo $button['semaforo_id']?></td>

              
            </tr>
            <?php endforeach; ?>
            </tbody>
            


          </table>
          <a href="#">Show All</a>
        </div>
      </main>