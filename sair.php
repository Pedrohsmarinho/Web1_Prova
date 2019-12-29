<?php 

include 'Init/init.php';


if(logado()){
	logout();
	redirect("index.php");
}

 ?>