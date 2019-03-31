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
<body style="background-color: black;">

    <div class="container my-5 rounded col-6">
        <img src="logoblack.png" class="rounded mx-auto d-block my-2" alt="..." style="width: 60%;">
        <form method="POST" action="">
          <div class="form-group col-8 mx-auto my-3">
            <label for="exampleInputEmail1" class="text-light font-weight-bold">Usuário</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email">
        </div>
        <div class="form-group col-8 mx-auto">
            <label for="exampleInputPassword1" class="text-light font-weight-bold">Senha</label>
            <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha">
        </div>
        <div class="form-group col-8 mx-auto">
            <button type="submit" class="btn btn-success col-4">Enviar</button>
            <!-- <a href="CadastroPaciente.html" class="btn btn-success col-4 text-light">Enviar</a> -->
        </div>
    </form>
    <?php 
    require_once('ClassesDAO/UsuarioDAO.php');
    $Login = new UsuarioDAO();
    if (!empty(@$_POST['email'])) {
        $Login->Login(@$_POST['email'],@$_POST['senha']);
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