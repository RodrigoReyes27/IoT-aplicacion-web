<?php
namespace app;

use app\models\Product;
use PDO;

class Database{
    public \PDO $pdo;
    public static Database $db; # Solo existira una INSTANCE de la base de datos

    public function __construct()
    {
        # 
        $this -> pdo = new PDO('mysql:host=localhost;port=3306;dbname=cruce', 'root', '');
            # ESTABLECER CONEXION CON LA BASE DE DATOS
        $this -> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # CHECAR SI SE CONECTO BIEN
        self::$db = $this;
    }

    public function getAmountLastDay() {
        $statement = $this->pdo->prepare("
        SELECT 'rowsLight', COUNT(*) FROM fotoresistor_movimiento fm WHERE fm.log_date >= now() - INTERVAL 1 day
        UNION
        SELECT 'rowsButton', COUNT(*) FROM log_peaton lp WHERE lp.log_date >= now() - INTERVAL 1 day
        UNION
        SELECT 'rowsDistance', COUNT(*) FROM sensor_distancia sd WHERE sd.log_date >= now() - INTERVAL 1 day
        UNION
        SELECT 'rowsPIR', COUNT(*) FROM sensor_pir sp WHERE sp.log_date >= now() - INTERVAL 1 day
        UNION
        SELECT 'rowsTemperature', COUNT(*) FROM sensor_temperatura st WHERE st.log_date >= now() - INTERVAL 1 day
        ");

        // Enviar query a la base de datos
        $statement->execute();

        // Retornar resultado de query en forma de arreglo
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getLogsTemperature() {
        // Establecer query a enviar
        $statement = $this->pdo->prepare('SELECT * FROM sensor_temperatura ORDER BY log_date DESC LIMIT 10');

        // Enviar query a la base de datos
        $statement->execute();

        // Retornar resultado de query en forma de arreglo
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCountTemperatureVentilador() {
        // Establecer query a enviar
        $statement = $this->pdo->prepare('SELECT Count(lectura) AS count FROM sensor_temperatura WHERE lectura > 21 AND log_date >= now() - INTERVAL 1 day');

        // Enviar query a la base de datos
        $statement->execute();

        // Retornar resultado de query en forma de arreglo
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCountTemperaturePlaca() {
        // Establecer query a enviar
        $statement = $this->pdo->prepare('SELECT Count(lectura) AS count FROM sensor_temperatura WHERE lectura <= 21 AND log_date >= now() - INTERVAL 1 day');
        // Enviar query a la base de datos
        $statement->execute();
        // Retornar resultado de query en forma de arreglo
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLogsDistance() {
        // Establecer query a enviar
        $statement = $this->pdo->prepare('SELECT * FROM sensor_distancia ORDER BY log_date DESC LIMIT 10');
        // Enviar query a la base de datos
        $statement->execute();
        // Retornar resultado de query en forma de arreglo
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLogsMovement() {
        // Establecer query a enviar
        $statement = $this->pdo->prepare('SELECT * FROM sensor_pir ORDER BY log_date DESC LIMIT 10');
        // Enviar query a la base de datos
        $statement->execute();
        // Retornar resultado de query en forma de arreglo
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLogsLight() {
        // Establecer query a enviar
        $statement = $this->pdo->prepare('SELECT * FROM fotoresistor_movimiento ORDER BY log_date DESC LIMIT 10');
        // Enviar query a la base de datos
        $statement->execute();
        // Retornar resultado de query en forma de arreglo
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLogsButton() {
        // Establecer query a enviar
        $statement = $this->pdo->prepare('SELECT * FROM log_peaton ORDER BY log_date DESC LIMIT 10');
        // Enviar query a la base de datos
        $statement->execute();
        // Retornar resultado de query en forma de arreglo
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}