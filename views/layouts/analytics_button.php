<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
const buttonAside = document.querySelector(".button");
const dashboardAside = document.querySelector(".dashboard");

buttonAside.classList.add("active"); 
dashboardAside.classList.remove("active");

const ventilador = document.querySelector(".ventilador");
const placa = document.querySelector(".placa");

google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Ventilador',    1 ],
          ['Placa Termica',  2    ],
        ]);

        var options = {
          pieHole: 0.4,
          legend: 'none',
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
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
          <div class="sales">
            <span class="material-icons-sharp"> analytics </span>
            <h3>Tiempo medio de respuesta de intersecciones</h3>
            <h1>2 minutos</h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>
          
        </div>

        <div class="recent-orders">
          <h2>Ultimos registros de Boton</h2>
          <table id="recent-orders--table">
            <thead>
              <tr>
                <th>Id </th>
                <th>Hora</th>
                <th>Boton</th>
                <th>Id semaforo</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($buttons as $button):?>
            <tr>
              <td class="primary"><?php echo $button['log_id']?></td>
              <td><?php echo $button['log_date']?></td>
              
              <?php if ($button['button_state'] == 1): ?>
                <td>Boton No Activo</td>
              <?php else: ?>
                <td>Boton Activado</td>
              <?php endif; ?>
              <td><?php echo $button['semaforo_id']?></td>

              
            </tr>
            <?php endforeach; ?>
            </tbody>
            


          </table>
          <a href="#">Show All</a>
        </div>
      </main>