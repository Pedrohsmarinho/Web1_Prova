<?php
include_once "Banco/conect.php";
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
echo "<pre>";
    print_r($data);
echo "</pre>";
if($data['password'] == $data['password2']){
    $smt2 = $con->prepare("SELECT * FROM users WHERE email = ?" );
    $smt2->execute([$data['email']]);
    $smt2->fetchAll(PDO::FETCH_ASSOC);

    if($smt2->rowCount() == 0){
        try{
            $smt = $con->prepare("INSERT INTO users(name, email, password) VALUES (?, ?, ?)");
            $smt -> bindParam(1, $data['name']);
            $smt -> bindParam(2, $data['email']);
            $smt -> bindParam(3, sha1($data['password']));
            $smt -> execute();
            $test = $smt -> fetchAll();
        }catch(PDOException $e){
            echo $e;
        }
    }else{
        echo "usuário já cadastrado";
    }
header('location: index.php?');
}