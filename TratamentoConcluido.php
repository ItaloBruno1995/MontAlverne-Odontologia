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
        <a class="nav-link text-light font-weight-bold">Paciente em atendimento: <?php echo $_GET['nome'] ?></a>
      </li>
    </ul>    
  </nav>
  <div class="container"> 
    <!-- <img src="logoblack.png" class="img-thumbnail float-right" alt="..." style="height: 150px;"> -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <?php
        echo "<a class='nav-link' href='SaudePaciente.php?nome=".$_GET['nome']."&id=".$_GET['id']."'>Saúde do paciente</a>";
        ?>
      </li>
      <li class="nav-item">
        <?php
        echo "<a class='nav-link' href='Necessidade.php?nome=".$_GET['nome']."&id=".$_GET['id']."'>Necessidade(s)</a>";
        ?>
      </li>
      <li class="nav-item">
        <?php
        echo "<a class='nav-link' href='PlanoTratamento.php?nome=".$_GET['nome']."&id=".$_GET['id']."'>Plano de Tratamento</a>";
        ?>
      </li>
      <li class="nav-item">
        <?php
        echo "<a class='nav-link active' href='TratamentoConcluido.php?nome=".$_GET['nome']."&id=".$_GET['id']."'>Tratamento(s) Concluído</a>";
        ?>
      </li>
      <li class="nav-item">
        <?php
        echo "<a class='nav-link' href='ProcedimentoRealizado.php?nome=".$_GET['nome']."&id=".$_GET['id']."'>Procedimento(s) Realizados</a>";
        ?>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="MenuDentista.php"></a>
      </li>
    </ul> 
  </div>
  



<div class="container ">  

<div class="container">
  <h1 class="display-5"> Tratamentos Concluidos</h1>
  
  <?php 
    require_once('ClassesDAO/DentistaDAO.php');
    $concluidos = new DentistaDAO();
    $concluidos->TratamentoConcluido($_GET['id']);


   ?>




</div>
<br><br><br><br>
<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type='text/javascript'>
 (function()
 {
  if( window.localStorage )
  {
   if( !localStorage.getItem( 'firstLoad' ) )
   {
    localStorage[ 'firstLoad' ] = true;
    window.location.reload();
 } 
 else
    localStorage.removeItem( 'firstLoad' );
}
})();

</script>
</body>
</html>