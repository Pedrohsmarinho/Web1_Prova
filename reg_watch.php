 <?php
include 'Banco/conect.php';
include 'Init/init.php';

$userid =id()['id'];
$serieid = $_POST['serie_id'];
$temp = $_POST['current_season'];
$epis = $_POST['current_episode'];

$ssm = $con -> prepare('SELECT user_id, serie_id, current_season, current_episode FROM users_series WHERE user_id = ? AND serie_id = ? ');
$ssm -> bindParam(1,$userid);
$ssm -> bindParam(2,$serieid);	
$ssm -> execute();
$toy= $ssm-> fetch();
$story= $ssm -> rowCount();
//var_dump($story);

if($story == 1){
	 try {
	$sut= $con-> prepare('UPDATE users_series SET current_season = ? , current_episode = ?  WHERE user_id = ? AND serie_id = ?');
	$sut-> bindParam(1,$temp);
	$sut-> bindParam(2,$epis);
	$sut-> bindParam(3,$userid);
	$sut-> bindParam(4,$serieid);
	$sut-> execute();
	$leza= $sut->fetch();
		//var_dump($leza);

redirect('index.php?url=atualizado com sucesso');
}catch (PDOException $e){
            echo $e;
}
 }

 else{
 	try {
 		$sum = $con-> prepare('INSERT INTO users_series(current_season , current_episode, user_id, serie_id) VALUES (?, ?, ?, ?)');
 		$sum-> bindParam(1,$temp);
 		$sum-> bindParam(2,$epis);
 		$sum-> bindParam(3,$userid);
 		$sum-> bindParam(4,$serieid);
 		// $sum-> bindParam(5,false);
 		$sum-> execute();
 redirect('index.php?url=Inserido com sucesso');

 	} catch (Exception $e) {
 		
 	}
 }

// var_dump($userid);
// var_dump($serieid);
// var_dump($temp);
// var_dump($epis);

$smt = $con -> prepare('SELECT series.*, users_series.current_season current_season, users_series.current_episode current_episode from series left join users_series on users_series.serie_id = series.id and users_series.user_id = ? order by users_series.current_season desc, series.name');
$smt -> bindParam(1, $usuareo);
$smt -> execute();
$try = $smt -> fetch();
//var_dump($try);
?>