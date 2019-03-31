  <?php
require_once ('conexao.php');

class DentistaDAO extends PDOconectar
{

  public $conn = null;
  function __construct()
  {
    $this->conn = PDOconectar::Conectar();
  }

  public function NovaNecessidade($nec,$cpf)//ok
  {
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d');
    $insertC = $this->conn->prepare("INSERT INTO tbl_necessidade(Necessidade,Cpf,Data_Inicial,Status)VALUES(?,?,?,?)");
    $insertC->bindValue(1, $nec);
    $insertC->bindValue(2, $cpf);
    $insertC->bindValue(3, $date);
    $insertC->bindValue(4, "0");
    $insertC->execute();  
  }
  public function ListarTratamento($cpf,$grupo,$nome)
  {
    $Tratamento = $this->conn->prepare("SELECT * FROM tbl_tratamento WHERE Cpf='$cpf' AND Grupo='$grupo' AND  Status='0' OR Status='1'");
    $Tratamento->execute();
    $linhas = $Tratamento->fetchAll(PDO::FETCH_OBJ);    
    echo "<form method='POST' action='SQLChange/ConcluirTratamento.php?grupo=".$grupo."&id=".$cpf."&nome=".$nome."'>";
    foreach ($linhas as $listar) {
      if ($listar->Status == 0) {
        $cor = 'list-group-item-danger';
      }elseif ($listar->Status == 1) {
        $cor = 'list-group-item-success';
      }
      echo "
      <ul class='list-group my-1'>  
      <li class='list-group-item ".$cor."'>
      <input type='checkbox' name='trat[]' value=".$listar->ID.">
      ".$listar->Tratamento."
      <button type='button' class='btn btn-light dropdown-toggle float-right  ' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Ação </button>
      <div class='dropdown-menu'>
      <a class='dropdown-item' href='SQLChange/AlterarStatusTratamento.php?Status=1&id=".$listar->ID."'>Etapa Tratamento Concluído</a>
      <a class='dropdown-item' href='SQLChange/AlterarStatusTratamento.php?Status=0&id=".$listar->ID."'>Etapa Tratamento Não Concluído</a>
      <a class='dropdown-item' href='SQLChange/AlterarStatusTratamento.php?Status=x&id=".$listar->ID."'>Excluir Etapa</a>
      </div>
      </ul>
      ";
    }    
    echo "<br><button type='submit' class='btn btn-primary'>Concluir Tratamento</button>
    </form>
    ";
  }

  public function AlterarStatus($status,$id)
  { 
    if ($status == 'x') {
      $delTratamento = $this->conn->prepare("DELETE FROM tbl_tratamento WHERE ID='$id'");
      $delTratamento->execute();
    }
    $Mudar = $this->conn->prepare("UPDATE tbl_tratamento SET Status=? WHERE ID='$id'");
    $Mudar->bindValue(1, $status);
    $Mudar->execute();
  }

  public function ConcluirTratamento($id,$grupo)
  { 

    foreach ($id as $value){
      date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d');
      $Mudar = $this->conn->prepare("UPDATE tbl_tratamento SET Status=?,Data_Final=? WHERE ID='$value'");
      $Mudar->bindValue(1, "Concluído");
      $Mudar->bindValue(2, $date);
      $Mudar->execute();

      $Mudar = $this->conn->prepare("UPDATE tbl_grupotrat SET Status=? WHERE Grupo='$grupo'");
      $Mudar->bindValue(1, "Concluído");
      $Mudar->execute();
    }
  }

  public function VerificarPacientes() //listar os paciente cadastrados la no DentistaIndex
  {
    $Paciente = $this->conn->prepare("SELECT * FROM tbl_paciente ");
    $Paciente->execute();
    $linhas = $Paciente->fetchAll(PDO::FETCH_OBJ);
    foreach ($linhas as $listar) {
      $nome = $listar->Nome;
      $dNascimento = $listar->Data_Nascimento;
      $idade = $listar->Idade;
      $rg = $listar->Rg;
      $cpf = $listar->Cpf;  
      echo "
      <tr>
      <td><a href='MenuDentista.php?id=".$cpf."&nome=".$nome."'>".$nome."</a></td>
      <td>".date('d/m/Y', strtotime($dNascimento))."</td>
      <td>".$rg."</td> 
      <td>".$cpf."</td>
      <td><a href='Search/VerFicha.php?id=".$listar->Cpf."'>Ver Ficha<i class='fas fa-clipboard-list ml-2'></i></a></td> 
      </tr>
      ";

    }
  }
  public function AddMaterial($data,$procedimento,$dentista,$material,$cpf)
  {
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d');
    $insertC = $this->conn->prepare("INSERT INTO tbl_proc_realizados(Data_proc,Procedimento,Material,Dentista,Cpf)VALUES(?,?,?,?,?)");
    $insertC->bindValue(1, $data);
    $insertC->bindValue(2, $procedimento);
    $insertC->bindValue(3, $material);
    $insertC->bindValue(4, $dentista);
    $insertC->bindValue(5, $cpf);
    $insertC->execute();  
  }
  public function ListarMaterial($cpf) //listar
  {
    $Tratamento = $this->conn->prepare("SELECT * FROM tbl_proc_realizados WHERE Cpf='$cpf'");
    $Tratamento->execute();
    $linhas = $Tratamento->fetchAll(PDO::FETCH_OBJ);    
    foreach ($linhas as $listar) {
      echo "
      <tr>
          <td>".date('d/m/Y', strtotime($listar->Data_proc))."</td>
          <td>".$listar->Procedimento."</td>
          <td>".$listar->Material."</td>
          <td>".$listar->Dentista."</td>
        </tr>

      ";
    }    
  }
  public function Addobssaude($obs,$cpf)
  {
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d');
    $insertC = $this->conn->prepare("INSERT INTO tbl_obssaude(Obs,Cpf,Data)VALUES(?,?,?)");
    $insertC->bindValue(1, $obs);
    $insertC->bindValue(2, $cpf);
    $insertC->bindValue(3, $date);
    $insertC->execute();  
  }
  public function ListaObs($cpf,$nome)
  {
    $Tratamento = $this->conn->prepare("SELECT * FROM tbl_obssaude WHERE Cpf='$cpf'");
    $Tratamento->execute();
    $linhas = $Tratamento->fetchAll(PDO::FETCH_OBJ);    
    foreach ($linhas as $listar) {
      echo "
      <h4>Estado de saúde do paciente (".date('d/m/Y', strtotime($listar->Data)).")<a href='SQLChange/ExcluirSaude.php?exid=".$listar->ID."&nome=".$nome."&id=".$cpf."'><i class='fas fa-trash-alt float-right'></i></a></h4>
      <p>".@$listar->Obs."</p>
      <hr>
      ";
    }      
  }
  public function CriarGrupo($grupo,$cpf)
  {
    $insertC = $this->conn->prepare("INSERT INTO tbl_grupotrat(Grupo,Cpf,Status)VALUES(?,?,?)");
    $insertC->bindValue(1, $grupo);
    $insertC->bindValue(2, $cpf);
    $insertC->bindValue(3, "Em Tratamento");
    $insertC->execute();  
  }
  public function ListarGrupos($cpf,$nome)
  {
    $Tratamento = $this->conn->prepare("SELECT * FROM tbl_grupotrat WHERE Cpf='$cpf'");
    $Tratamento->execute();
    $linhas = $Tratamento->fetchAll(PDO::FETCH_OBJ);    
    foreach ($linhas as $listar) {
      if ($listar->Status == 'Em Tratamento') {
        $link = '';
      }elseif ($listar->Status == 'Concluído') {
        $link = 'href=VerTratConcluido.php';
      }
      $grupo = $listar->Grupo;
      echo " 
      <tr>
        <td><a href='AdicionarTratamento.php?grupo=".$listar->Grupo."&id=".$cpf."&status=".$listar->Status."&nome=".$nome."'>".$listar->Grupo."</a></td>
        <td>".$listar->Status."</td>
        <td></td>
      </tr>
      ";
    }        
    
  }
  public function viewTrataC($cpf,$grupo)//ok
  {
    $Tratamento = $this->conn->prepare("SELECT * FROM tbl_tratamento WHERE Grupo='$grupo'");
    $Tratamento->execute();
    $linhas = $Tratamento->fetchAll(PDO::FETCH_OBJ); 
    var_dump($grupo); 
    foreach ($linhas as $listar) {
    echo "
    <ul class='list-group my-1'>  
      <li class='list-group-item list-group-item-success'>
      ".$listar->Grupo."
      </li>
    </ul>
    ";
    }
  }


  
  public function NovoTratamento($trat,$cpf,$grupo)//ok
  {
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d');
    $insertC = $this->conn->prepare("INSERT INTO tbl_tratamento(Tratamento,Data_Inicial,Cpf,Status,Grupo)VALUES(?,?,?,?,?)");
    $insertC->bindValue(1, $trat);
    $insertC->bindValue(2, $date);
    $insertC->bindValue(3, $cpf);
    $insertC->bindValue(4, "0");
    $insertC->bindValue(5, $grupo);
    $insertC->execute();  
  }
  public function ListaNecessidades($cpf)
  {
    $Tratamento = $this->conn->prepare("SELECT * FROM tbl_necessidade WHERE Cpf='$cpf' ORDER BY Data_Inicial DESC");
    $Tratamento->execute();
    $linhas = $Tratamento->fetchAll(PDO::FETCH_OBJ);    
    foreach ($linhas as $listar) {
      echo "
      <h4>Necessidade do paciente (".date('d/m/Y', strtotime($listar->Data_Inicial))."): ".$listar->Necessidade."<a href='SQLChange/ExcluirNec.php?exid=".$listar->ID."'><i class='fas fa-trash-alt float-right'></i></a></h4>
      <hr>
      ";
    }      
  }
  public function ExcluirNec($id)
  {
    $delTratamento = $this->conn->prepare("DELETE FROM tbl_necessidade WHERE ID='$id'");
    $delTratamento->execute();
  }   
  public function ExcluirSaude($id)
  {
    $delTratamento = $this->conn->prepare("DELETE FROM tbl_obssaude WHERE ID='$id'");
    $delTratamento->execute();
  }  

}
?>