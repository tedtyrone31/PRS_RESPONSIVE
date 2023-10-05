<?php 
    $server = 'localhost';
    $userDB = 'root';
    $userPassword = '';
    $dataBase = 'prs_prototype';

    $connection = mysqli_connect($server,$userDB,$userPassword,$dataBase);

    if (!$connection) {
        die("Database connection Failed.");
    }
?>
