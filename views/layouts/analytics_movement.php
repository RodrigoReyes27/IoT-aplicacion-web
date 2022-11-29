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
        <h1>Analiticas Movimiento</h1>

        <div class="date">
          <input type="date" />
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