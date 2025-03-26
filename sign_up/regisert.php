<?php
session_start();
$errors=[];
require_once('../db.php');
function checkEmail($pdo,$email){
$sql="SELECT emeil from users where emeil=:email";
$stmt=$pdo->prepare($sql);

$stmt->execute(['email'=>$email]);
$user=$stmt->fetch(PDO::FETCH_ASSOC);
if( $user){
  return true;
}
}
function validEmail($email){
if(filter_var($email,FILTER_VALIDATE_EMAIL)){
  return true;
}else{
  return false;
}

}

function checkpwd($pwd){
  $pattern = '/^(?=.*[0-9])(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/';
  if(preg_match($pattern,$pwd)){
    return true;
  }else{
    return false;
  }



}
function matchedPwd($pwd,$pwd_conf){
  if($pwd===$pwd_conf){
    return true;
  }else{
    return false;
  }
}
function validUsername($name){
  $name = trim($name);
    
  $pattern = '/^[a-zA-Z][a-zA-Z ]{2,19}$/';

    if(preg_match($pattern,$name)){
      return true;
    }else{
      return false;
    }

}
function insertUser($name,$email,$pwd,$pdo){
$query="INSERT into users (name,emeil,pwd) values(:name,:email,:pwd)";
$stmt=$pdo->prepare($query);
$stmt->execute([
  ':name' => $name,
  ':email' => $email,
  ':pwd' => $pwd
]);
}

if($_SERVER['REQUEST_METHOD']==='POST'){
  $name= htmlspecialchars($_POST['name']);
  $email=htmlspecialchars($_POST['email']);
  $pwd= htmlspecialchars($_POST['password']);
  $pwd_conf= htmlspecialchars($_POST['password_conf']);
  if(!validEmail($email)) {
    $errors['invalide email'] = 'This email is not valid';
} 
elseif(checkEmail($pdo, $email)) {
    $errors['usedEmail'] = 'This email is already registered';
}

if(!validUsername($name)) {
    $errors['invalide name'] = 'Name must be 3-20 chars (letters, numbers, _)';
}

if(!checkpwd($pwd)) {
    $errors['invalide password'] = 'Password must be 8+ chars with 1 number, 1 uppercase, and 1 special char';
} 
elseif(!matchedPwd($pwd, $pwd_conf)) {
    $errors['missmatch'] = 'Passwords do not match';
}

if(empty($errors)) {
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    insertUser($name, $email, $pwd, $pdo);
    header('Location: ../sign_in/index.php');
    exit();
} else {
    $_SESSION['errors'] = $errors;
    $_SESSION['old_input'] = [
        'name' => $name,
        'email' => $email
    ];
    header('Location: index.php'); 
    exit();
}
}