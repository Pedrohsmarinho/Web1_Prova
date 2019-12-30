<?php 

include 'Banco/conect.php';

include 'includes/header.php';

include 'Init/init.php';

$mail = $_SESSION['email'];
$id = id()['id'];

if (logado()){

try {
$akm = $con->prepare('SELECT * FROM users WHERE email = ? AND id = ?');
$akm-> bindParam(1,$mail);
$akm-> bindParam(2,$id);
$akm->execute();
$ws = $akm->fetch();
//var_dump($ws);
}	
	catch (Exception $e) { echo'Deu Ruim';}	
}
else{
	echo'deu ruim desgraça';
}
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
<h3 class="light">Edite suas informações</h3>

    <form action="editar.php" method="POST">

<input type="hidden" name="id" id="id"value="<?=$ws['id']?>">

<div class="input-field col s12">
			<input type="text" name="name" id="name" value="<?= $ws['name'] ?>">
			<label for="name">name</label>
</div>

<div class="input-field col s12">
			<input type="text" name="email" id="email" value="<?= $ws['email']?>">
			<label for="email">email</label>
</div>

<div class="input-field col s12">
			<input type="password" name="password" id="password">
			<label for="password">senha</label>
</div>

<div class="input-field col s12">
			<input type="password" name="password2" id="password2">
			<label for="password2">confirmar senha</label>
</div>

<button  type="submit" name="add"class="btn">Atualizar</button>
 
</div>
</div>

<?php
    include_once 'includes/footer.php';
?>