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
        $movementByTime = $router->db->getCountMovementByTimeSideWalk();
        $countMovement = $router->db->getCountMovementDayNight();

        return $router->renderView('layouts/analytics_light', [
            'lights' => $logLight,
            'countMovement' => $countMovement,
            'movementByTime' => $movementByTime
        ]);
    }

    public function analytics_movement(Router $router) {
        $logMovement = $router->db->getLogsMovement();
        $countMovement = $router->db->getCountMovementByTimeRoad();

        return $router->renderView('layouts/analytics_movement', [
            'movements' => $logMovement,
            'countMovement' => $countMovement
        ]);
    }

    public function analytics_boton(Router $router) {
        $logButton = $router->db->getLogsButton();
        $cantLogButton = $router->db->getCantLogsButtonLastDay();
        $countButtonByTime = $router->db->getCountButtonByTime();

        return $router->renderView('layouts/analytics_button', [
            'buttons' => $logButton,
            'cantLogButton' => $cantLogButton,
            'countButtonByTime' => $countButtonByTime
        ]);
    }
}