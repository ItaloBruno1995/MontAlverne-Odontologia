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
    
  </nav>

  <div class="container my-3">
    <div class="row">
      <h1 class=" font-weight-bold mr-5 my-3 col-10">Cadastrar paciente</h1> 
      <a class="btn btn-warning float-right my-auto text-dark font-weight-bold" href="DentistaIndex.php" role="button">Ver Pacientes</a>
    </div>
  </div>
  <hr>

  
  <div class="container my-5">

    <h3 class="font-weight-bold">Dados Pessoais</h3>
    <form method="post" action="" enctype="multipart/form-data">
      <div class="form-row">
        <div class="col-md-5 mb-3">
          <label for="validationDefault01 font-weight-bold text-light">Nome Completo</label>
          <input type="text" name="nomeC" class="form-control" id="validationDefault01"   >
        </div>
        <div class="col-md-3 mb-3">
          <label for="validationDefault02">Idade</label>
          <input type="text" name="idade" class="form-control" id="validationDefault02"  >
        </div> 
        <div class="col-md-2 mb-3">
          <label for="validationDefault02">Data de Nascimento</label>
          <input type="date" name="dNascimento" class="form-control" id="validationDefault02"  >
        </div>                 
      </div>

      <div class="form-row">
        <div class="col-md-5 mb-3">
          <label for="validationDefault03">Registro Geral (RG)</label>
          <input type="text" name="rg" class="form-control" id="validationDefault03"  >
        </div>
        <div class="col-md-5 mb-3">
          <label for="validationDefault04">CPF</label>
          <input type="text" name="cpf" class="form-control" id="validationDefault04"  >
        </div>  
        <div class="col-md-5 mb-3">
          <div class="custom-file">
            <label for="validationDefault04">Foto p/ perfil</label><br>
            <input type="file" required="" name="fileUpload" >
          </div>
        </div>        
      </div>      
      <hr class="bg-dark">
      <!-- <h3 class="font-weight-bold">Localização</h3>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="validationDefault03">CEP</label>
          <input type="text" class="form-control" id="validationDefault03"  required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationDefault04">Bairro</label>
          <input type="text" class="form-control" id="validationDefault04"  required>
        </div>
        <div class="col-md-2 mb-3">
          <label for="validationDefault05">Rua</label>
          <input type="text" class="form-control" id="validationDefault05"  required>
        </div>        
      </div>
      <div class="form-row">
        <div class="col-md-2 mb-3">
          <label for="validationDefault05">Nº</label>
          <input type="text" class="form-control" id="validationDefault05"  required>
        </div>
        <div class="col-md-8 mb-3">
          <label for="validationDefault05">Complemento</label>
          <input type="text" class="form-control" id="validationDefault05"  required>
        </div>
      </div>
      <hr class="bg-dark">
      <h3 class="font-weight-bold">Contato</h3>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="validationDefault03">E-mail</label>
          <input type="text" class="form-control" id="validationDefault03"  required>
        </div>
        <div class="col-md-3 mb-3">
          <label for="validationDefault04">Telefone Fixo</label>
          <input type="text" class="form-control" id="validationDefault04"  required>
        </div>
        <div class="col-md-3 mb-3">
          <label for="validationDefault05">Celular</label>
          <input type="text" class="form-control" id="validationDefault05"  required>
        </div>        
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="validationDefault05">Em caso de emergência avisar:</label>
          <input type="text" class="form-control" id="validationDefault05"  required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationDefault05">Telefone de Emergência</label>
          <input type="text" class="form-control" id="validationDefault05"  required>
        </div>
      </div>
      <hr class="bg-dark">
      <h3 class="font-weight-bold">Informações Adicionais</h3>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="validationDefault03">Estado Civil</label>
          <input type="text" class="form-control" id="validationDefault03"  required>
        </div>
        <div class="col-md-3 mb-3">
          <label for="validationDefault04">Profissão</label>
          <input type="text" class="form-control" id="validationDefault04"  required>
        </div>
        <div class="col-md-3 mb-3">
          <label for="validationDefault05">Indicado por:</label>
          <input type="text" class="form-control" id="validationDefault05"  required>
        </div>        
      </div> -->
      <button class="btn btn-warning text-dark font-weight-bold" type="submit">Cadastrar</button>
    </form>
    <?php 
    require_once('ClassesDAO/SecretariaDAO.php');
    require 'lib/WideImage.php';
    $new_paciente = new SecretariaDAO();
    if (!empty(@$_POST['nomeC'])) {
      $new_paciente->Cadastrar(@$_POST['nomeC'],@$_POST['dNascimento'],@$_POST['idade'],@$_POST['rg'],@$_POST['cpf']);

      if(isset($_FILES['fileUpload']))
      {

    date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
    //$ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
    $new_name = md5(time()) . ".png"; //Definindo um novo nome para o arquivo
    $dir = 'images/'; //Diretório para uploads
    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    $img = WideImage::load('images/'.$new_name.'');
    $red = $img->resize(180,180);
    $red->saveToFile('images/'.$new_name.'',9);
    $new_paciente->AddFoto($new_name,@$_POST['cpf']);
  }
}
?>





</div>
<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>