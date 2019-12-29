<?php
include 'Banco/conect.php';
include 'Init/init.php';

$userid =id()['id'];
$serieid = $_POST['serie_id'];
$temp = $_POST['current_season'];
$epis = $_POST['current_episode'];

if(logado()){
	$smt= $con->prepare('DELETE FROM users_series WHERE user_id = ? AND serie_id = ? AND current_season = ? AND current_episode = ?');
	$smt-> bindParam(1, $userid);
	$smt-> bindParam(2, $serieid);
	$smt-> bindParam(3, $temp);
	$smt-> bindParam(4, $epis);
	$smt->execute();
	// var_dump($userid);
	// var_dump($serieid);
	// var_dump($temp);
	// var_dump($epis);
redirect('index.php?url=deletado com sucesso');
}
else{
	echo('não foi dessa vez');
}