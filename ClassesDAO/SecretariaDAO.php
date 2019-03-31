<?php
require_once ('conexao.php');

class SecretariaDAO extends PDOconectar
{

  public $conn = null;
  function __construct()
  {
    $this->conn = PDOconectar::Conectar();
  }

  public function Cadastrar($nome,$dNascimento,$idade,$rg,$cpf)
  {
    echo "$nome";
    $insertC = $this->conn->prepare("INSERT INTO tbl_paciente(Nome,Data_Nascimento,Idade,Rg,Cpf)VALUES(?,?,?,?,?)");
    $insertC->bindValue(1, $nome);
    $insertC->bindValue(2, $dNascimento);
    $insertC->bindValue(3, $idade);
    $insertC->bindValue(4, $rg);
    $insertC->bindValue(5, $cpf);
    $insertC->execute();      
  }
  public function AddFoto($foto,$cpf)
  {
    $insertC = $this->conn->prepare("INSERT INTO tbl_fperfil(Img,Cpf)VALUES(?,?)");
    $insertC->bindValue(1, $foto);
    $insertC->bindValue(2, $cpf);
    $insertC->execute();      
  }
  public function AddProcFinanceiro($nomeP,$valor,$cpf,$fpagamento)
  {
    $insertC = $this->conn->prepare("INSERT INTO tbl_financeiro(Procedimento,Valor,Forma_Pagamento,Cpf)VALUES(?,?,?,?)");
    $insertC->bindValue(1, $nomeP);
    $insertC->bindValue(2, $valor);
    $insertC->bindValue(3, $fpagamento);
    $insertC->bindValue(4, $cpf);
    $insertC->execute();      
  }
  public function ListarPagFinanceiro($cpf,$nome)
  {
    $Tratamento = $this->conn->prepare("SELECT * FROM tbl_financeiro WHERE Cpf='$cpf'");
    $Tratamento->execute();
    $linhas = $Tratamento->fetchAll(PDO::FETCH_OBJ); 
    foreach ($linhas as $listar) {
      if ($listar->Status == 0) {
        $cor = 'list-group-item-danger';
        $txt = "Aguardando Pagamento...";
      }elseif ($listar->Status == 1) {
        $cor = 'list-group-item-success';
        $txt = "Pagamento Efetuado";
      }
      echo "
      <tr>
        <td>".date('d/m/Y', strtotime($listar->Data_P))."</td>
        <td>".$listar->Procedimento."</td>
        <td>R$ ".$listar->Valor."</td>
        <td>".$listar->Forma_Pagamento."</td>
        <td class=".$cor.">".$txt."</td>
        <td>
        <button type='button' class='btn btn-light dropdown-toggle float-right  ' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Opções </button>
        <div class='dropdown-menu'>
      <a class='dropdown-item' href='SQLChange/AlterarPagamento.php?Status=1&cpf=".$listar->ID."&nome=".$nome."&id=".$cpf."'>Procedimento Pago</a>
      <a class='dropdown-item' href='SQLChange/AlterarPagamento.php?Status=0&cpf=".$listar->ID."&nome=".$nome."&id=".$cpf."'>Procedimento não pago</a>
      <a class='dropdown-item' href='SQLChange/AlterarPagamento.php?Status=x&cpf=".$listar->ID."&nome=".$nome."&id=".$cpf."'>Excluir</a>
      </div>
      </td>
      </tr>
      ";
    }    
  }
  public function AlterarStatusFinanceiro($status,$cpf)
  { 
    if ($status == 'x') {
      $delTratamento = $this->conn->prepare("DELETE FROM tbl_financeiro WHERE ID='$cpf'");
      $delTratamento->execute();
    }
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d');
    $Mudar = $this->conn->prepare("UPDATE tbl_financeiro SET Status=?,Data_P=? WHERE ID='$cpf'");
    $Mudar->bindValue(1, $status);
    $Mudar->bindValue(2, $date);
    $Mudar->execute();
    
  }

}
?>