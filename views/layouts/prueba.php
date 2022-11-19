<div>
    <?php foreach($temperatures as $temperature):?>
        <div>
            <p>Fecha: <?php echo $temperature['log_date'] . " Temperatura: ". $temperature['lectura']; ?></p>
        </div>
    <?php endforeach; ?>
</div>