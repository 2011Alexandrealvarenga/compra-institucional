<?php 
session_start();
try{
    $pdo = new PDO("mysql:dbname=classificados;host=localhost","root","");
}catch(PDOException $e){
    echo "FALOU: ".$e->getMessage();
    exit;
}

;?>