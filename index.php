<?php 

include 'Banco/conect.php';

//header
include_once 'includes/header.php';

include 'Init/init.php';
?>


<div class="row">
  <div class="col s12 m6 push-m3">
            <h3 class="light">Ranking da Semana</h3>
       <table class="striped">
        <thead>
          <tr>
             
              
              <th>Series Name:</th>
              <th>Genre:</th>
              <th>Seasons:</th>
              <th>Synopsis:</th>
          </tr>
        </thead>

        <tbody>
          <?php 
            $results= $con->prepare("SELECT * FROM series");
            $results->execute();
            $control = $results->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($control);
          ?>
        <?php foreach ($control as $test): ?>

        
          <tr>
              <td><?= $test["name"];?></td>
              <td><?= $test["genre"];?></td>
              <td><?= $test["seasons"];?></td>
              <td><?= $test["synopsis"];?></td>
            </td>
            <td>
                <?php if(logado()): ?>
                <a href="edit.php?id=<?php echo $test['id']?>" class="btn-floating orange"> <i class="material-icons">edit</i></a>
            </td>
          <?php endif?>
            <td>
              <?php if(logado()): ?>
        
              <a href="" class="btn-floating red"> <i class="material-icons">remove</i></a>
              </td>
          <?php endif ?>
          </tr>
         
     <?php endforeach;?>

        </tbody>
      </table>
            <a href="addUser.php" class="btn">Registre-se</a>
            <a href="login.php" class="btn">Logar</a>
  </div>
</div>
<?php 
//footer
include_once 'includes/footer.php'; 
?>