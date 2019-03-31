<?php 
@ob_start();
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index.php');
}
$logado = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <!-- Meta tags Obrigatórias -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 <title>Inst. Mont'Alverne</title>
</head>
<body>
 <nav class="navbar navbar-light bg-dark"> <!-- navbar-expand-lg -->
  <a class="navbar-brand text-light" href="MenuGeral.php">Instituto Mont'Alverne</a>
  <ul class="nav justify-content-end ">
    <li class="nav-item">
    </li>
  </ul>    
</nav>

  <!-- <img src="logoblack.png" class="img-thumbnail float-right" alt="..." style="height: 150px;">

  // echo "<script language=\"javascript\">alert('Tratamento já concluído');</script>";
  // echo "<script language=\"javascript\">window.history.back();</script>";   -->


  <div class="container my-5">
    <h1 class="display-5">Adicione etapas de tratamento para o grupo<br> <?php echo $_GET['grupo']; ?></h1>

    <form method="POST" action="">
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Etapa do Tratamento</label>
        <textarea placeholder="Digite aqui..." class="form-control" name="tratamento" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Adicionar Tratamento</button>

      <a onclick="window.history.back('2');" class="btn btn-warning float-right my-auto  text-dark font-weight-bold" role="button">Voltar</a>
    </form>
    <hr>
    <h4>Plano de Tratamento</h4>


    <?php 
    require_once('ClassesDAO/DentistaDAO.php');
    $novotrat = new DentistaDAO();
    if (!empty($_POST['tratamento'])) {
      $novotrat->NovoTratamento(@$_POST['tratamento'],$_GET['id'],$_GET['grupo']);
    }
    $novotrat->ListarTratamento($_GET['id'],$_GET['grupo'],$_GET['nome']);
    ?>
  </div>




  <br><br><br><br>





  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>