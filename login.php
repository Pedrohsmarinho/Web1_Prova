<?php 
include_once 'includes/header.php';
include 'Banco/conect.php';
include 'Init/init.php';
?>
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