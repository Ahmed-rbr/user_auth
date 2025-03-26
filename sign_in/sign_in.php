<?php
session_start();
$errors=[];
require_once('../db.php');

function getUsers($pdo,$emeil){
  try{
  $query="SELECT * from users where emeil=:email ";

$stmt=$pdo->prepare($query);

$stmt->execute(['email'=>$emeil]);
$resu=$stmt->fetch(PDO::FETCH_ASSOC);

return $resu;
}
catch(PDOException $e){
  echo('databse eror').$e->getMessage();
  return false;
}
} ;

if($_SERVER['REQUEST_METHOD']==='POST'){
$email= htmlspecialchars($_POST['email']);
$pwd=$_POST['pwd'];
$user=getUsers($pdo,$email);
if($user&&password_verify($pwd,$user['pwd'])){
  $user=getUsers($pdo,$email);
  $_SESSION['name']=$user['name'];
  $_SESSION['user_id']=$user['id'];
  $_SESSION['email']=$user['email'];
  $_SESSION['name']=$user['name'];
  
  header('Location: ../index.php');
}






else{

  $errors['error']='please make sure your pwd and email are correct';
  
  $_SESSION['eror']=$errors;
  $_SESSION['old_eml']=$email;
  header('Location: index.php'); 
  exit();
}


}
