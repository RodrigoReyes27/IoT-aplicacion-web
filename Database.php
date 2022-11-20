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
        $statement = $this->pdo->prepare('SELECT Count(lectura) AS count FROM sensor_temperatura WHERE lectura > 25');

        // Enviar query a la base de datos
        $statement->execute();

        // Retornar resultado de query en forma de arreglo
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCountTemperaturePlaca() {
        // Establecer query a enviar
        $statement = $this->pdo->prepare('SELECT Count(lectura) AS count FROM sensor_temperatura WHERE lectura < 25');
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