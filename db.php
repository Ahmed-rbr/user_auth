<?php

$host ='localhost';
$dbname ='auth';
$dbuser ='toto';
$dbpwd ='';
$dsn="mysql:host=$host;dbname=$dbname;charset=utf8mb4";
try{
  $pdo=new PDO($dsn,$dbuser,$dbpwd);



  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


}catch(PDOException $e){
  die("❌ Connection failed: " . $e->getMessage());
}