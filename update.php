<?php 
//this add the header of the page 
include_once 'includes/header.php';

// this add the database on system
include  'Banco/conect.php';

include 'Init/init.php';

if(!empty($_POST['id'])){

    try {
        
    $smt = $con->prepare("UPDATE series SET name= ? , genre= ?, seasons= ?, synopsis= ?  WHERE id = ?");
    $smt->bindParam(1,$_POST['name']);
    $smt->bindParam(2,$_POST['genre']);
    $smt->bindParam(3,$_POST['seasons']);
    $smt->bindParam(4,$_POST['synopsis']);
    $smt->bindParam(5,$_POST['id']);
    $smt->execute();
    $smt->fetch();
   // echo $smt->rowCount();
} catch (PDOException $e){
            echo $e;
}
  redirect('index.php?url=atualizado com sucesso');
}

?>