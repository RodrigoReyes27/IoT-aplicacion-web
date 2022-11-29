<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
const buttonAside = document.querySelector(".button");
const dashboardAside = document.querySelector(".dashboard");

buttonAside.classList.add("active"); 
dashboardAside.classList.remove("active");

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