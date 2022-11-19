<?php

require_once __DIR__.'/../vendor/autoload.php';
use app\Router;
use app\controllers\ProductController;

$router = new Router();

/*
Php8 does not accept
$router->post('/products/create', [ProductController::class, 'create']);
    # esto da un error con el metodod call_user_func($fn);
    # ya que en php8 esto solo es para funciones staticas

It accepts
$router -> get('/products/create', [new ProductController, 'create']);
*/

$router -> get('/', [new ProductController, 'home']);
$router -> get('/home', [new ProductController, 'home']);

$router -> get('/prueba', [new ProductController, 'prueba']);

// $router -> get('/products/create', [new ProductController, 'create']);
// $router -> post('/products/create', [new ProductController, 'create']);
// $router -> get('/products/update', [new ProductController, 'update']);
// $router -> post('/products/update', [new ProductController, 'update']);
//     # $router -> get('/products/delete', [new ProductController, 'delete']);
//     # no se usa este porque no se quiere que cualquiera pueda acceder a esta metodo
// $router -> post('/products/delete', [new ProductController, 'delete']); 


# el modo en que esto funciona es
# $router crea un nuevo objeto 
# -> le da el valor usando una funcion dentro de la clase donde se crea el objeto en este caso Router 
# get($url, $fn) llama a la funcion especificada dentro de la clase Router y le da ciertos parametros
# $url es la url en la que se encuentra el usuario
# $fn = [new ProductController (llama a una clase), 'algo' (ejecuta la funcion especificada, tiene que estar dentro de la clase especificada)]


$router -> resolve(); # detectara la ruta actual y ejecutara la pagina solicitada