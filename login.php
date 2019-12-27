<?php 
include_once 'includes/header.php';
include 'Banco/conect.php';
include 'Init/init.php';

$smt = $con-> prepare("SELECT email  FROM users WHERE email = ? AND password = ?");
$smt -> bindParam(1,$email);
$smt -> bindParam(2, sha1($senha));
$smt -> execute();
$resul = $smt -> fetchAll();

?>
<div class="row">
<div class="col s12 m6 push-m3"> 
<h3 class="light">Logar</h3>

    <form action="index.php" method="POST">
    <div class="input-field col s12">
				<input type="text" name="email" id="email">
				<label for="email">email</label>
			 </div>
    <div class="input-field col s12">
				<input type="password" name="passord" id="passord">
				<label for="passord">senha</label>
</div>

<button  type="submit" name="add"class="btn">logar</button>
 
</div>
</div>

<?php
    include_once 'includes/footer.php';
?>