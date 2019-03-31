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

<div class="container my-3"> 
  
  <!-- <img src="logoblack.png" class="img-thumbnail float-right" alt="..." style="height: 150px;"> -->
  
</div>
<div class="container my-5">
<hr>
  <h4>Etapas Concluídas</h4>
<?php 
  require_once('ClassesDAO/DentistaDAO.php');
  $ver = new DentistaDAO();

  $ver->viewTrataC($_GET['cpf'],$_GET['grupo']);



 ?>

</div>

<br><br><br><br>
<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- <script type='text/javascript'>
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

</script> -->
</body>
</html>