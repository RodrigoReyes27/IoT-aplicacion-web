<?php
namespace app\controllers;

use app\Router;

class Controller{
    public function dashboard(Router $router){
        $cantidadDatos = $router->db->getAmountLastDay();

        return $router ->renderView('layouts/dashboard', [
            'cantidades' => $cantidadDatos
        ]);
    }
    
    public function analytics_temperature(Router $router) {
        $logTemperatures = $router->db->getLogsTemperature();
        $counterVentilador = $router->db->getCountTemperatureVentilador();
        $counterPlaca = $router->db->getCountTemperaturePlaca();
        $countTiempo = $router->db->getCountTemperatureByTime();

        return $router->renderView('layouts/analytics_temperature', [
            'temperatures' => $logTemperatures,
            'counterVentilador' => $counterVentilador,
            'counterPlaca' => $counterPlaca,
            'countTiempo' => $countTiempo,
        ]);
    }
    
    public function analytics_distance(Router $router) {
        $logDistance = $router->db->getLogsDistance();
        $avgDistance = $router->db->getAverageDistanceLastDay();

        return $router->renderView('layouts/analytics_distance', [
            'distances' => $logDistance,
            'avgDistance' => $avgDistance
        ]);
    }

    public function analytics_light(Router $router) {
        $logLight = $router->db->getLogsLight();
        $countMovement = $router->db->getCountMovementByTime();
        $movementByTime = $router->db->getCountMovementDayNight();

        return $router->renderView('layouts/analytics_light', [
            'lights' => $logLight,
            'countMovement' => $countMovement,
            'movementByTime' => $movementByTime
        ]);
    }

    public function analytics_movement(Router $router) {
        $logMovement = $router->db->getLogsMovement();

        return $router->renderView('layouts/analytics_movement', [
            'movements' => $logMovement
        ]);
    }

    public function analytics_boton(Router $router) {
        $logButton = $router->db->getLogsButton();
        $cantLogButton = $router->db->getCantLogsButtonLastDay();

        return $router->renderView('layouts/analytics_button', [
            'buttons' => $logButton,
            'cantLogButton' => $cantLogButton
        ]);
    }
}