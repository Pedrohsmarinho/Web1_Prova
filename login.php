<?php 
include_once 'includes/header.php';
include 'Banco/conect.php';
include 'Init/init.php';
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
<h3 class="light">Logar</h3>

    <form action="log.php" method="POST">
<div class="input-field col s12">
			<input type="text" name="email" id="email">
			<label for="email">email</label>
	</div>

<div class="input-field col s12">
			<input type="password" name="password" id="password">
			<label for="password">senha</label>
</div>

<button  type="submit" name="add"class="btn">logar</button>
 
</div>
</div>

<?php
    include_once 'includes/footer.php';
?>