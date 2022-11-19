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
        $statement = $this->pdo->prepare('SELECT * FROM sensor_temperatura ORDER BY log_date DESC');

        // Enviar query a la base de datos
        $statement->execute();

        // Retornar resultado de query en forma de arreglo
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProducts($search){
        # $search = '' es asi para que por default, no tenga ningun valor

        // if ($search) {
        //     $statement = $this -> pdo -> prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
        //         # se usa PREPARE cuando SE QUIERE CONSEGUIR INFO
        //         # se usa EXEC cuando se QUIERE AÑADIR ALGO

        //     $statement -> bindValue(':title', "%$search%");

        // }
        // else{
        //     $statement = $this -> pdo -> prepare('SELECT * FROM products ORDER BY create_date DESC');  
        //             # se usa PREPARE cuando SE QUIERE CONSEGUIR INFO
        //             # se usa EXEC cuando se QUIERE AÑADIR ALGO
        // }

        // $statement -> execute();
        // return $statement ->fetchAll(PDO::FETCH_ASSOC);    
        //     # FECTH_ASSOC lo establece como ARRAY
    }
    
    public function getProductById($id) {
        
        // $statement = $this -> pdo -> prepare('SELECT * FROM products WHERE id = :id');
        //     # se usa PREPARE cuando SE QUIERE CONSEGUIR INFO
        //     # se usa EXEC cuando se QUIERE AÑADIR ALGO

        // $statement ->bindValue(':id', $id);
        //     // Va a dar una lista con todos los productos con ese ID
            
        // $statement -> execute();
        // return $statement -> fetchAll(PDO::FETCH_ASSOC);    
        //     # FECTH_ASSOC lo establece como ARRAY
    
    }

    public function createProduct(Product $product){

        // $statement = $this -> pdo -> prepare("INSERT INTO products (title, image, description, price, create_date) VALUES (:title, :image, :description, :price, :date)");
        // # LA FORMA EN LA QUE VALUE SE GUARDA AQUI ES COMO PARAMETRO
        // # VALUES ('$title', '', '$description', '$price', '$date') NO ES SEGURO USAR ESTO PORQUE PUEDEN USAR MYSQL INJECTION

        // $statement -> bindValue(':title', $product -> title);
        // $statement -> bindValue(':image', $product -> imagePath);
        // $statement -> bindValue(':description', $product -> description);
        // $statement -> bindValue(':price', $product -> price);
        // $statement -> bindValue(':date', date('Y-m-d H:i:s'));
            
        // $statement -> execute();
        //     # GUARDAR DATOS EN LA BASE DE DATOS

    }

    public function updateProduct(Product $product) {
        
        // $statement = $this -> pdo->prepare("UPDATE products SET title = :title, image = :image, description = :description, price = :price, create_date = :date WHERE id = :id");
        // $statement->bindValue(':title', $product -> title);
        // $statement->bindValue(':image', $product -> imagePath);
        // $statement->bindValue(':description', $product -> description);
        // $statement->bindValue(':price', $product -> price);
        // $statement->bindValue(':date', date('Y-m-d H:i:s'));
        // $statement->bindValue(':id', $product -> id);

        // $statement->execute();
        // header('Location: /products');
    }
    
    public function deleteProduct($id){
        // $statement = $this -> pdo -> prepare('DELETE FROM products WHERE id = :id');
        // $statement -> bindValue(':id', $id);
        // $statement -> execute();
    }
}