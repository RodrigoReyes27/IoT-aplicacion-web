<?php

namespace app;

class Router{

    public array $getRoutes = [];
    public array $postRoutes = [];
    public Database $db;

    public function __construct(){
        $this -> db = new Database();
    }

    public function get($url, $fn){ # estas funciones reciben los datos de index.php
        $this -> getRoutes[$url] = $fn;
    }

    public function post($url, $fn){
        $this -> postRoutes[$url] = $fn;
    }
    
    public function resolve(){
        # $currentUrl = $_SERVER['PATH_INFO'] ?? '/'; # obtendra el url en el que se encuentra
        $method = $_SERVER['REQUEST_METHOD'];

        $currentUrl = $_SERVER['REQUEST_URI'] ?? '/';
        if (strpos($currentUrl, '?') !== false) {
            $currentUrl = substr($currentUrl, 0, strpos($currentUrl, '?'));
        }

        if ($method === 'GET'){
            $fn = $this -> getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this -> postRoutes[$currentUrl] ?? null;
        }
        if ($fn){
            call_user_func($fn, $this); # $fn va a llamar a una de las funciones de ProductController
        }
        else {
            echo "Page not found";
        }
    }

    public function renderView($view, $params = []) # view será el path que se quiere mostar ej products/index
    {
        
        # $params = Un valor que recibe de PRODUCTSCONTROLLER
        # este LOOP  GUARDARA VALORES de PRODUCTS, SEARCH que recibio de PARAMS y los usará en la pagina que sea llamada
        foreach ($params as $key => $value){
            $$key = $value;
        }

        ob_start(); # hara que cosas como ECHO se guarden en la CACHE
        include_once __DIR__."/views/$view.php";
        $content = ob_get_clean(); # limpiara la CACHE, y los datos que haya tenido, los guarda en la variable CONTENT
        
        # el VALOR de CONTENT se usara en "layout.php"
        include_once __DIR__.'/views/_layout.php';
    }       
}