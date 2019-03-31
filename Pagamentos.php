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
      echo "<a class='nav-link' href='PlanoTratamento.php?nome=".$_GET['nome']."&id=".$_GET['id']."'>Plano de Tratamento</a>";
      ?>
    </li>
    <li class="nav-item">
      <?php
      echo "<a class='nav-link' href='ProcedimentoRealizado.php?nome=".$_GET['nome']."&id=".$_GET['id']."'>Procedimento(s) Realizados</a>";
      ?>
    </li>
    <li class="nav-item">
      <?php
      echo "<a class='nav-link active' href='Pagamentos.php?nome=".$_GET['nome']."&id=".$_GET['id']."'>Financeiro</a>";
      ?>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="MenuDentista.php"></a>
    </li>
  </ul> 
</div>

<div class="container my-5 ">
  <h1 class="display-4 my-5 col-10">Financeiro</h1>
  <form method="post" action="">
    <div class="form-row">
      <div class="col-md-5 mb-3">
        <label for="validationDefault01 font-weight-bold text-light">Nome do procedimento</label>
        <input type="text" name="nomep" class="form-control" id="validationDefault01"   >
      </div>
    </div>
    <div class="form-row">
        <div class="col-auto my-1">
          <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label>
          <select name="fpagamento" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>Forma de pagamento</option>
            <option value="Dinheiro">Dinheiro</option>
            <option value="Cartão de Crédito">Cartão de Crédito</option>
            <option value="Boleto Bancário">Boleto Bancário</option>
          </select>
        </div>
    </div>
    <div class="form-row">
      <div class="col-sm-3 my-1">
        <label class="sr-only" for="inlineFormInputGroupUsername">Valor</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">R$</div>
          </div>
          <input type="text" name="valor" class="form-control" id="inlineFormInputGroupUsername" placeholder="ex: 54,00">
        </div>
      </div>                 
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
  </form>
  <?php 
  require_once('ClassesDAO/SecretariaDAO.php');
  $new = new SecretariaDAO();
  if (!empty($_POST['nomep'])) {
    $new->AddProcFinanceiro(@$_POST['nomep'],@$_POST['valor'],$_GET['id'],@$_POST['fpagamento']);
  }



  ?>
  <table class="table my-3">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Data</th>
        <th scope="col">Procedimento</th>
        <th scope="col">Valor (R$)</th>
        <th scope="col">Forma Pagamento</th>
        <th scope="col">Status do pagamento</th>
        <th scope="col">Status do pagamento</th>

      </tr>
    </thead>
    <tbody>
      <?php 
      $new->ListarPagFinanceiro($_GET['id'],$_GET['nome']);

      ?>
      
    </tbody>
  </table>


</div>
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