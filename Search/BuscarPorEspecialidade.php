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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css"/>
  <title>Inst. Mont'Alverne</title>
</head>
<body>
  <nav class="navbar navbar-light bg-dark"> <!-- navbar-expand-lg -->
    <a class="navbar-brand text-light" href="../MenuGeral.php">Instituto Mont'Alverne</a>
    
  </nav>
  <div class="container"> 
    <h1>Buscar por especialidade</h1>
    <form method="POST" action="">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Qual a necessidade do peciente?</label>
        <select class="form-control col-6" name="nec" id="exampleFormControlSelect1">
          <option value="Cirurgia Periodontal Estética (Plástica Gengival)">Cirurgia Periodontal Estética (Plástica Gengival)</option>
          <option value="Ortodontia">Ortodontia</option>
          <option value="Cirurgia Periodontal Funcional (Aumento de Coroa)">Cirurgia Periodontal Funcional (Aumento de Coroa)</option>
          <option value="Reabilitações Complexas">Reabilitações Complexas</option>
          <option value="Clareamento Dental">Clareamento Dental</option>
          <option value="Resina Composta Anterior">Resina Composta Anterior</option>
          <option value="Harmonizações Orofacial">Harmonizações Orofacial</option>
          <option value="Resina Composta Posteior (Restauração Extensas)">Resina Composta Posteior (Restauração Extensas)</option>
          <option value="Laminados Cerâmicos">Laminados Cerâmicos</option>
          <option value="Tratamento de Hipersensibilidade Dentinária">Tratamento de Hipersensibilidade Dentinária</option>
          <option value="Pino Intrarradicular">Pino Intrarradicular</option>
          <option value="Endodontia">Endodontia</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
  </div>


  <div class="container my-5">
    <div class="table-responsive my-3">
      <table id="example" class="table table-bordered">
        <thead>
          <tr>
            <th>Nome Paciente</th>
            <th>Data Nascimento</th>
            <th>Registro Geral</th>
            <th>Cpf</th>
            <th>Necessidade</th>
            <th>Ver Ficha</th>
          </tr>
        </thead>
        <tbody>

          <?php 
          require_once('../ClassesDAO/SearchDAO.php');
          $buscarN = new SearchDAO();
          if (!empty($_POST['nec'])) {
          $buscarN->BuscaPorEspecialidade($_POST['nec']);
          }
          ?>
          
        </tbody>
      </table>
    </div>
  </div>







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
</body>
</html>