
<!-- // //PDO - PHP Data Object
// define('DATABASE_SEVER','localhost');
// define('DATABASE_USER','root');
// define('DATABASE_PASSWORD','');
// define('DATABASE_NAME','phpapp');
// $connection= null;

// try{
//     $connection= New PDO("mysql:host".DATABASE_SEVER.";dbname".DATABASE_NAME,DATABASE_USER,DATABASE_PASSWORD);
//     $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     echo"connected successfully";



    
// }
// catch(PDOException $e){
//     echo"Connection failed:".$e->getMessage();
//     $connection = null;
// } -->
<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'phpapp';

    $conn = new mysqli($server, $user, $password, $database, 3307);
    if ($conn) {
        mysqli_query($conn, "SET NAMES 'utf8'");
        echo 'Connected successfully';
    } else {
        echo 'failed connection';
    }

?>