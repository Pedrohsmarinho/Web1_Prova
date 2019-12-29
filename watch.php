<?php 
include_once 'includes/header.php';
include 'Banco/conect.php';
include 'Init/init.php';

$id = id()['id']; 
$get = $_GET['id'];

$smt = $con -> prepare('SELECT user_id, serie_id, current_season, current_episode FROM users_series WHERE user_id = ? AND serie_id = ? ');
$smt -> bindParam(1,$id);
$smt -> bindParam(2,$get);	
$smt -> execute();
$net = $smt-> fetch();
// var_dump($net);
?>

<div class="row">
<div class="col s12 m6 push-m3"> 
	<h3 class="light">Assistir</h3>
<form action="reg_watch.php" method="POST">
	<input type="hidden" name="serie_id" value="<?=$get?>">
<div class="input-field col s12">
	<input type="number" name="current_season" id="current_season" value="<?=$net['current_season'];?>">
	<label for="current_season">Temporada Atual</label>
</div>

	<div class="input-field col s12">
		<input type="number" name="current_episode" id="current_episode"value="<?=$net['current_episode'];?>" >
		<label for="current_episode">Episódio Atual</label>
	</div>
	<?php //var_dump($flix); ?>
	<button  type="submit" name="add"class="btn">Estou assistindo</button>
</div>
</div>
</form>

<?php include 'includes/footer.php';?>