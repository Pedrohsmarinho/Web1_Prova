<?php
session_start();

function logado(){	
	return $_SESSION['logado']?? false;	
}
function login($email, $password){
	$_SESSION['logado'] = true;
	$_SESSION['email'] = $email;	
	$_SESSION['password']= $password;
return true;

}
function redirect($url){
	header('location:' . $url);
exit();

}	

function logout(){
	session_destroy();
}

function id(){
		global $con;
		$smt = $con -> prepare ('SELECT id FROM users WHERE email = ?');
		$smt -> bindParam(1,$_SESSION['email']);
		$smt -> execute();
		$click = $smt -> fetch();
//var_dump($click);
		return $click;
	}

?>