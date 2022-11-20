<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
const lightAside = document.querySelector(".light");
const dashboardAside = document.querySelector(".dashboard");

lightAside.classList.add("active"); 
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
            <h3># Veces Movimiento detectado durante el dia</h3>
            <h1>20</h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>

          <!-- EXPENSES -->
          <div class="expenses">
            <span class="material-icons-sharp"> bar_chart </span>
            <h3># Veces Movimiento detectado durante la noche</h3>
            <h1>10</h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>

          <!-- INCOME -->
          <div class="income">
            <span class="material-icons-sharp"> stacked_line_chart </span>
            <div class="middle">
              <div class="left">
                <h3>Activacion de Luz</h3>
                <h1>44%</h1>
              </div>
              <div class="progress">
                <svg>
                  <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                  <p>44%</p>
                </div>
              </div>
            </div>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>
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