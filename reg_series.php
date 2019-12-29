<?php
include_once "Banco/conect.php";
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $smt = $con->prepare("SELECT * FROM series = ?" );
    $smt->execute([$data]);
    $smt->fetchAll(PDO::FETCH_ASSOC);

    if($smt->rowCount() == 0){
        try{
            $smt = $con->prepare("INSERT INTO series(name, genre ,  seasons, synopsis) VALUES (?, ?, ?, ?)");
            $smt -> bindParam(1, $data['name']);
            $smt -> bindParam(2, $data['genre']);
            $smt -> bindParam(3, $data['seasons']);
            $smt -> bindParam(4, $data['synopsis']);
            $smt -> execute();
            $series = $smt -> fetchAll();
    //redirect('index.php?url=Sucesso');
            header('location: index.php?id=Sucesso');
        }catch(PDOException $e){
            echo $e;
        }
    }else{
        echo "Series já cadastrada";
    }
 