<?php 
include_once 'includes/header.php';
include 'Banco/conect.php';
include 'Init/init.php';

$email = $_POST['email']?? "";
$senha = $_POST['password']?? "";

 if($email == "" || $senha == ""){
	echo 'Email ou Senha Estão Vazios';
 	exit();
 }

$smt = $con-> prepare("SELECT email  FROM users WHERE email = ? AND password = ?");
$smt -> bindParam(1,$email);
$smt -> bindParam(2, sha1($senha));
$smt -> execute();
$resul = $smt -> fetchAll();

?>