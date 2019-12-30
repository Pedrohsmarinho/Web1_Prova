<?php 
//this add the header of the page 
include_once 'includes/header.php';?>
<?php 
// this add the database on system
include  'Banco/conect.php';

include 'Init/init.php';
?>

<nav>
    <div class="nav-wrapper depp black">
      <a href="index.php" class="brand-logo">ParziFlix</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <?php if(logado()): ?>
        <!-- <li><a href="dontwatch.php">Remover Serie</a></li> -->
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
	<h3 class="light"> Nova Serie</h3>
		<form action="reg_series.php" method="POST">
			<div class="input-field col s12">
				<input type="text" name="name" id="name">
				<label for="name">Nome da Série</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="genre" id="Seasson">
				<label for="genre">genêro</label>
			</div>
			<div class="input-field col s12">
				<input type="number" name="seasons" id="seasons">
				<label for="seasons">Temporada</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="synopsis" id="synopsis">
				<label for="synopsis">Sinópse</label>
			</div>
			<button  type="submit" class="btn">Adicione uma nova série</button>
			<!-- <a href="index.php" class="btn green">Home</a> -->
		</form>
	</div>
</div> 

<?php 
//this add the footer on the page
include_once 'includes/footer.php';

?>
