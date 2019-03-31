<?php
require_once ('conexao.php');

class UsuarioDAO extends PDOconectar
{

  public $conn = null;
  function __construct()
  {
    $this->conn = PDOconectar::Conectar();
  }

  public function Login($email,$senha)
  {
    try {
            // date_default_timezone_set('America/Sao_Paulo');
            // $date = date('Y-m-d');
      $Validar = $this->conn->prepare ("SELECT * FROM tbl_usuario WHERE Usuario='$email' AND Senha='$senha'");
      $Validar->execute();
      $linhas = $Validar->fetchAll(PDO::FETCH_OBJ);
      foreach ($linhas as $listar) {
        $Tipo = $listar->Tipo;        
      }
      if ($Validar->rowCount() == 1) {
        session_start();
        if ($Tipo==1) { //Secretária          
          $_SESSION['login'] = $email;
          $_SESSION['senha'] = $senha;
          echo "<script language=\"javascript\">window.location.href = 'MenuGeral.php'</script>";
        }elseif ($Validar->rowCount() <= 0) {
          echo "Usuário Inválido";
              // echo "<script language=\"javascript\">alert(\"Usuário Inválido!!\")</script>";
              // echo "<script language=\"javascript\">window.history.back();</script>";
        } 
      }

    } catch (PDOException $ex) {
      echo "Erro: " . $ex->getMessage();
    }

  }
  }
  ?>