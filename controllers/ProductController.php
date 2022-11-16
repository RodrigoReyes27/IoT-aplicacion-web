<?php
namespace app\controllers;

use app\Router;
use app\Database;
use app\models;
use app\models\Product;

class ProductController{
    public function home(Router $router){
        // $products = $router -> db -> getProducts();
        
        return $router ->renderView('layouts/home');

        // return $router ->renderView('products/index', [
        //     'products' => $products # 'nombreVarMandar' => $valorVar
        // ]); # va a llamar a la funcion renderView con parametro 'products/index' de la clase Router 

    }

    // public function create(Router $router){
    //     $errors = [];
    //     $productData = [
    //         'title' => '',
    //         'description' => '',
    //         'image' => '',
    //         'price' => ''
    //     ];

    //     if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //         # AQUI SE VA A GUARDAR LA INFORMACION INGRESADA con la CLASE PRODUCT

    //         #productData['algo'] = el valor que se ingresara en la pagina web. EJ titulo, descr, precio en CREATE.PHP o UPDATE.PHP. ESTO CORRESPONDE al valor en "NAME"
    //         $productData['title'] = $_POST['title'];
    //         $productData['description'] = $_POST['description'];
    //         $productData['price'] = (float)$_POST['price'];
    //         $productData['imageFile'] = $_FILES['image'] ?? null;

    //         $product = new Product(); # CREA UN OBJETO DE LA CLASE PRODUCT

    //         $product -> load($productData); # load va a cargar en la variable $var -> los valores dentro del parentesis
    //         $errors = $product -> save();

    //         if(empty($errors)){
    //             header('Location: /products');
    //             exit;
    //         }

    //     }
        
    //     return $router ->renderView('products/create', [
    //         'product' => $productData,
    //         'errors' => $errors
    //     ]); # va a llamar a la funcion renderView con parametro 'products/index' de la clase Router
    // }

    // public function update(Router $router){
    //     $id = $_GET['id'] ?? null;
        
    //     if (!$id){
    //         header('Location:/products');
    //         exit;
    //     }
        
    //     $errors = [];
        
    //     // Establecer arreglo donde se guadran valores ingresados por usuario 
    //     $productData = $router -> db -> getProductById($id); // Tendra formato de ARREGLO 2D, ya que se obtiene un arreglo(base datos) con arreglos (productos)
        
    //     // ACTUALIZAR VALORES DEL PRODUCTO
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $productData['id'] = $productData[0]['id']; // Esto es para que se envie el ID del producto que se debe de actualizar
    //         $productData['title'] = $_POST['title'];
    //         $productData['description'] = $_POST['description'];
    //         $productData['price'] = (float)$_POST['price'];
    //         $productData['imageFile'] = [1,2,3];
    //         $productData['image'] = $productData[0]['image'] ?? null; // Si existe un path con esa imagen se guarda, es para prevenir errores al momento de actualizar (cuando no se actualiza la imagen)
    //         $productData['imageFile'] = $_FILES['image'] ?? null; // por si se actualiza la imagen

    //         $product = new Product(); # CREA UN OBJETO DE LA CLASE PRODUCT

    //         $product -> load($productData); # load va a cargar en la variable $var -> los valores dentro del parentesis
    //         $errors = $product -> save();

    //         if(empty($errors)){
    //             /*
    //             header('Location: /products');
    //             exit;
    //             */
    //         }

    //     }

    //     return $router ->renderView('products/update', [
    //         'product' => $productData[0], // Como se recibe un arreglo con los productos (arreglos) con ese id SE ESTA TRABAJANDO CON ARREGLOS 2D
    //                                      // por esto, para acceder al primer producto con ese ID se ocupa usar INDICE 0
    //         'errors' => $errors
    //     ]);
        
    // }
    
    // public function delete(Router $router){
        
    //     $id = $_POST['id'] ?? null;

    //     if(!$id){ # si el id no existe, volver a la pagina principal y no hacer nada
    //         header('Location: /products');
    //         exit;
    //     }

    //     $router -> db -> deleteProduct($id);
    //     header('Location: /products');
    //     exit;
    // }

}