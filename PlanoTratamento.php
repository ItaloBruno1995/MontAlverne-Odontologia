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
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css"/>
 <title>Inst. Mont'Alverne</title>
</head>
<body>
 <nav class="navbar navbar-light" style="background-color: black;"> <!-- navbar-expand-lg -->
    <a class="navbar-brand text-light font-weight-bold" href="MenuGeral.php">Instituto Mont'Alverne</a>
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
      echo "<a class='nav-link active' href='PlanoTratamento.php?nome=".$_GET['nome']."&id=".$_GET['id']."'>Plano de Tratamento</a>";
      ?>
    </li>
    <li class="nav-item">
      <?php
      echo "<a class='nav-link' href='ProcedimentoRealizado.php?nome=".$_GET['nome']."&id=".$_GET['id']."'>Procedimento(s) Realizados</a>";
      ?>
    </li>
    <li class="nav-item">
        <?php
        echo "<a class='nav-link' href='Pagamentos.php?nome=".$_GET['nome']."&id=".$_GET['id']."'>Financeiro</a>";
        ?>
      </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="MenuDentista.php"></a>
    </li>
  </ul> 
</div>

<div class="container my-5">
 <h1 class="display-5">Plano de Tratamento</h1>
 <form method="POST" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Nome do tratamento</label>
    <input type="text" name="titulo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Esse campo vai ser o grupo do tratamento para esse paciente.</small>
  </div>
  <button type="submit" class="btn btn-primary">Criar Grupo</button>
</form>
<hr>
  <h4>Grupos de tratamento</h4>
<?php 
  require_once('ClassesDAO/DentistaDAO.php');
  $novogrupo = new DentistaDAO();
  if (!empty($_POST['titulo'])) {
    $novogrupo->CriarGrupo($_POST['titulo'],$_GET['id']);
  }
  ?>
  <div class="container my-5">
    <div class="table-responsive my-3">
      <table id="example" class="table table-bordered">
        <thead>
          <tr>
            <th>Grupo</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          
            <?php 
            $novogrupo->ListarGrupos($_GET['id'],$_GET['nome']);
            ?>
          
        </tbody>
      </table>
    </div>
  </div>
<!-- <form method="POST" action="SQLChange/ConcluirTratamento.php">
  <table class="table table-hover">
   <thead>
    <tr>
     <th scope="col">#</th>
     <th scope="col">Necessidade</th>
     <th scope="col"></th>
   </tr>
 </thead>
 <tbody>
   <?php 
   //require_once('ClassesDAO/DentistaDAO.php');
   ?>        
 </tbody>
</table>
<button type="submit" class="btn btn-primary">Concluir Tratamento</button>
</form> -->

</div>
</div>

<br><br><br><br>
<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable( {
        "language": {
          "sEmptyTable": "Nenhum registro encontrado",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(Filtrados de _MAX_ registros)",
          "sInfoPostFix": "",
          "sInfoThousands": ".",
          "sLengthMenu": "_MENU_ resultados por página",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sZeroRecords": "Nenhum registro encontrado",
          "sSearch": "Pesquisar",
          "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
          },
          "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
          }
        }
      } );
    } );
  </script>

</script>
</body>
</html>