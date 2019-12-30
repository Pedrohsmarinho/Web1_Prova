<?php 
include_once 'includes/header.php';
include 'Banco/conect.php';
include 'Init/init.php';

$id = id()['id']; 
$get = $_GET['id'];

$byo = $con -> prepare('SELECT user_id, serie_id, current_season, current_episode FROM users_series WHERE user_id = ? AND serie_id = ? ');
$byo -> bindParam(1,$id);
$byo -> bindParam(2,$get);	
$byo -> execute();
$amazon = $byo-> fetch();
 //var_dump($amazon);
?>
<nav>
    <div class="nav-wrapper depp black">
      <a href="index.php" class="brand-logo">ParziFlix</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <?php if(logado()): ?>
        <li><a href="sair.php">Sair</a></li>
        <?php else: ?>
        <li><a href="addUser.php">Cadastre-se</a></li>
        <li><a href="login.php">Logar</a></li>
      <?php endif ?>
      </ul>
    </div>
</nav>

<div class="row">
<div class="col s12 m6 push-m3"> 
<h3 class="light">Deletar Serie</h3>

<form action="del_watch.php" method="POST">
	<input type="hidden" name="serie_id" value="<?=$get?>">
<div class="input-field col s12">
	<input type="number" name="current_season" id="current_season" value="<?=$amazon['current_season'];?>">
	<label for="current_season">Temporada Atual</label>
</div>

	<div class="input-field col s12">
		<input type="number" name="current_episode" id="current_episode"value="<?=$amazon['current_episode'];?>" >
		<label for="current_episode">Episódio Atual</label>
	</div>
	<button  type="submit" name="add"class="btn">Deletar</button>
 
</div>
</div>

<?php include 'includes/footer.php';?>