      <main>
        <h1>Dashboard</h1>

        <div class="date">
          <input type="date" />
        </div>

        <div class="insights">

          <div class="sales">
            <span class="material-icons-sharp"> analytics </span>
            <h3>Cantidad de Registros Temperatura</h3>
            <h1><?php echo $cantidades[4]['COUNT(*)']; ?></h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>
      
          <div class="expenses">
            <span class="material-icons-sharp"> bar_chart </span>
            <h3>Cantidad de Registros Distancia</h3>
            <h1><?php echo $cantidades[2]['COUNT(*)']; ?></h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>

          <div class="income">
            <span class="material-icons-sharp"> stacked_line_chart </span>
            <h3>Cantidad de Registros Movimiento</h3>
            <h1><?php echo $cantidades[3]['COUNT(*)']; ?></h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>

          <div class="sales">
            <span class="material-icons-sharp"> analytics </span>
            <h3>Cantidad de Registros Fotorresistor</h3>
            <h1><?php echo $cantidades[0]['COUNT(*)']; ?></h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>
      
          <div class="expenses">
            <span class="material-icons-sharp"> bar_chart </span>
            <h3>Cantidad de Registros Boton</h3>
            <h1><?php echo $cantidades[1]['COUNT(*)']; ?></h1>
            <small class="text-muted"> Ultimas 24 horas </small>
          </div>
        </div>

        <div class="recent-orders">
          <h2></h2>
        </div>
      </main>