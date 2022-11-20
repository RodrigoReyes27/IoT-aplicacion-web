<?php
namespace app\controllers;

use app\Router;

class Controller{
    public function dashboard(Router $router){
        
        return $router ->renderView('layouts/dashboard');
    }
    
    public function analytics_temperature(Router $router) {
        $logTemperatures = $router->db->getLogsTemperature();
        $counterVentilador = $router->db->getCountTemperatureVentilador();
        $counterPlaca = $router->db->getCountTemperaturePlaca();

        return $router->renderView('layouts/analytics_temperature', [
            'temperatures' => $logTemperatures,
            'counterVentilador' => $counterVentilador,
            'counterPlaca' => $counterPlaca
        ]);
    }
    
    public function analytics_distance(Router $router) {
        $logDistance = $router->db->getLogsDistance();

        return $router->renderView('layouts/analytics_distance', [
            'distances' => $logDistance,
        ]);
    }

    public function analytics_movement(Router $router) {
        $logMovement = $router->db->getLogsMovement();

        return $router->renderView('layouts/analytics_movement', [
            'movements' => $logMovement
        ]);
    }

    public function analytics_light(Router $router) {
        $logLight = $router->db->getLogsLight();

        return $router->renderView('layouts/analytics_light', [
            'lights' => $logLight
        ]);
    }

    public function analytics_boton(Router $router) {
        $logButton = $router->db->getLogsButton();

        return $router->renderView('layouts/analytics_button', [
            'buttons' => $logButton
        ]);
    }
}