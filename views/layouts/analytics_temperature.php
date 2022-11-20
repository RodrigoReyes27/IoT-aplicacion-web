<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
const tempAside = document.querySelector(".temperature");
const dashboardAside = document.querySelector(".dashboard");

tempAside.classList.add("active"); 
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

<p style ="display:none" class="ventilador" value=<?php echo $counterVentilador[0]['count'];?>></p>
<p style ="display:none" class="placa" value=<?php echo $counterPlaca[0]['count'];?>></p>

<main>
        <h1>Analiticas Temperatura</h1>

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
            <h3># Veces activado el Ventilador</h3>
            <h1><?php echo $counterVentilador[0]['count']; ?></h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>

          <!-- EXPENSES -->
          <div class="expenses">
            <span class="material-icons-sharp"> bar_chart </span>
            <h3># Veces activada la Placa Termica</h3>
            <h1><?php echo $counterPlaca[0]['count']; ?></h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>

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