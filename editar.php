<?php 
//this add the header of the page 
include_once 'includes/header.php';

// this add the database on system
include  'Banco/conect.php';

include 'Init/init.php';

$pass= $_POST['password'];
$pass2 = $_POST['password2'];

if (logado() && $pass == $pass2) {
//echo 'to aqui';
if(!empty($_POST['id'])){

    try {
    $smt = $con->prepare("UPDATE users SET name= ? ,email= ?, password= ? WHERE id = ?");
    $smt->bindParam(1,$_POST['name']);
    $smt->bindParam(2,$_POST['email']);
    $smt->bindParam(3,sha1($_POST['password']));
    $smt->bindParam(4,$_POST['id']);
    $smt->execute();
    $smt->fetch();
    echo $smt->rowCount();
    redirect('index.php?url=atualizado com sucesso');
} catch (PDOException $e){
            echo $e;
}
}
}

?>