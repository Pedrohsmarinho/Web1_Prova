<?php 
//this add the header of the page 
include_once 'includes/header.php';
// this add the database on system
include  'Banco/conect.php';

include 'Init/init.php';

$t2=$_GET['id'];
     try {

    $smt= $con->prepare("SELECT * FROM series WHERE id = ?");
            $smt -> bindParam(1,$t2);
            $smt->execute();
            $controle = $smt->fetchAll(PDO::FETCH_ASSOC);
  
} catch (PDOException $e){
            echo $e;
}
//var_dump($controle);
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
	<h3 class="light"> Edite suas Series</h3>
		<form action="update.php" method="POST">
			<?php foreach ($controle as $vscode):?>
	
			
			
			<input type="hidden" name="id" value="<?=$vscode['id'];?>">
			<div class="input-field col s12">
				<input type="text" name="name" id="name" value="<?=$vscode['name'];?>">
				<label for="name">Nome Da Serie</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="genre" id="genre"value="<?= $vscode['genre'];?>">
				<label for="genre">Gênero</label>
			</div>
			<div class="input-field col s12">
				<input type="number" name="seasons" id="seasons"value="<?= $vscode['seasons'];?>">
				<label for="seasons">Temporada</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="synopsis" id="synopsis"value="<?=$vscode['synopsis'];?>">
				<label for="synopsis">Sinopse</label>
			</div>
			<button  type="submit" class="btn">Adicionar nova Serie</button>
			<a href="index.php" class="btn green">Voltar</a>
		<?php endforeach?>
		</form>
	</div>
</div> 

<?php 
//this add the footer on the page
include_once 'includes/footer.php';
?>