<?php 
//this add the header of the page 
include_once 'includes/header.php';
// this add the database on system
include  'Banco/conect.php';
$t2=$_GET['id'];
     try {

    $smt= $con->prepare("SELECT * FROM series WHERE id = ?");
            $smt -> bindParam(1,$_GET['id']);
            $smt->execute();
            $controle = $smt->fetchAll(PDO::FETCH_ASSOC);
  
} catch (PDOException $e){
            echo $e;
}
//var_dump($controle);
?>
<div class="row">
	<div class="col s12 m6 push-m3"> 
	<h3 class="light"> Judite suas Séries</h3>
		<form action="update.php" method="POST">
			<?php foreach ($controle as $vscode):?>
	
			
			
			<input type="hidden" name="id" value="<?=$vscode['id'];?>">
			<div class="input-field col s12">
				<input type="text" name="name" id="name" value="<?=$vscode['name'];?>">
				<label for="name">Nome da bichinha</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="genre" id="genre"value="<?= $vscode['genre'];?>">
				<label for="genre">gênru</label>
			</div>
			<div class="input-field col s12">
				<input type="number" name="seasons" id="seasons"value="<?= $vscode['seasons'];?>">
				<label for="seasons">Tempo arada</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="synopsis" id="synopsis"value="<?=$vscode['synopsis'];?>">
				<label for="synopsis">Sinopzzz</label>
			</div>
			<button  type="submit" class="btn">Adicionar nova Judite</button>
			<a href="index.php" class="btn green">Voltar pra casinha</a>
		<?php endforeach?>
		</form>
	</div>
</div> 

<?php 
//this add the footer on the page
include_once 'includes/footer.php';
?>