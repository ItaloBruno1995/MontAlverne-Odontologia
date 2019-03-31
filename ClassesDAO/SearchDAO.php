<?php
require_once ('conexao.php');

class SearchDAO extends PDOconectar
{

  public $conn = null;
  function __construct()
  {
    $this->conn = PDOconectar::Conectar();
  }
  public function ListarFicha($cpf)
  {
    $Ficha = $this->conn->prepare("SELECT * FROM tbl_paciente 
                                                INNER JOIN tbl_fperfil ON tbl_paciente.Cpf = tbl_fperfil.Cpf
                                                WHERE tbl_paciente.Cpf='$cpf'");
    $Ficha->execute();
    $linhas = $Ficha->fetchAll(PDO::FETCH_OBJ);    
    foreach ($linhas as $listar) {
      
    }    
    echo "
        <img src='../images/".$listar->Img."' class='rounded float-right img-thumbnail ml-2 my-4' alt=''>

        <div class='list-group'>
        <a href='#'' class='list-group-item list-group-item-action active'>
          <b>Informações Paciente</b>
        </a>
        <a  class='list-group-item list-group-item-action'><b>Data Nascimento:</b> ".$listar->Data_Nascimento."</a>
        <a  class='list-group-item list-group-item-action'><b>Idade:</b> ".$listar->Idade."</a>
        <a  class='list-group-item list-group-item-action'><b>Registro Geral:</b> ".$listar->Rg."</a>
        <a  class='list-group-item list-group-item-action'><b>CPF:</b> ".$listar->Cpf."</a>
      </div>

      ";
  }
  public function ListarLocalizacao()
  {
    $Ficha = $this->conn->prepare("SELECT * FROM tbl_paciente 
                                                INNER JOIN tbl_fperfil ON tbl_paciente.Cpf = tbl_fperfil.Cpf");
    $Ficha->execute();
    $linhas = $Ficha->fetchAll(PDO::FETCH_OBJ);    
    foreach ($linhas as $listar) {
      
    }    
    echo "

        <div class='list-group my-2'>
        <a href='#'' class='list-group-item list-group-item-action active'>
          <b>Informações Paciente</b>
        </a>
        <a  class='list-group-item list-group-item-action'><b>CEP: </b></a>
        <a  class='list-group-item list-group-item-action'><b>Bairro: </b></a>
        <a  class='list-group-item list-group-item-action'><b>Rua: </b></a>
        <a  class='list-group-item list-group-item-action'><b>Nº: </b></a>
        <a  class='list-group-item list-group-item-action'><b>Complemento: </b></a>
      </div>

      ";
  }
  public function ListarContato()
  {
    $Ficha = $this->conn->prepare("SELECT * FROM tbl_paciente 
                                                INNER JOIN tbl_fperfil ON tbl_paciente.Cpf = tbl_fperfil.Cpf");
    $Ficha->execute();
    $linhas = $Ficha->fetchAll(PDO::FETCH_OBJ);    
    foreach ($linhas as $listar) {
      
    }    
    echo "
        <div class='list-group my-2'>
        <a href='#'' class='list-group-item list-group-item-action active'>
          <b>Informações Paciente</b>
        </a>
        <a  class='list-group-item list-group-item-action'><b>E-mail: </b></a>
        <a  class='list-group-item list-group-item-action'><b>Telefone-Fixo: </b></a>
        <a  class='list-group-item list-group-item-action'><b>Celular: </b></a>
        <a  class='list-group-item list-group-item-action'><b>Caso de emergência avisar: </b></a>
        <a  class='list-group-item list-group-item-action'><b>Telefone emergência </b></a>
      </div>


      ";
  }
  public function ListarInfo()
  {
    $Ficha = $this->conn->prepare("SELECT * FROM tbl_paciente 
                                                INNER JOIN tbl_fperfil ON tbl_paciente.Cpf = tbl_fperfil.Cpf");
    $Ficha->execute();
    $linhas = $Ficha->fetchAll(PDO::FETCH_OBJ);    
    foreach ($linhas as $listar) {
      
    }    
    echo "
        <div class='list-group my-2'>
        <a href='#'' class='list-group-item list-group-item-action active'>
          <b>Informações Paciente</b>
        </a>
        <a  class='list-group-item list-group-item-action'><b>Estado Civil: </b></a>
        <a  class='list-group-item list-group-item-action'><b>Profissão: </b></a>
        <a  class='list-group-item list-group-item-action'><b>Indicado por: </b></a>
      </div>


      ";
  }
  public function BuscaPorEspecialidade($espec)
  {
    $Ficha = $this->conn->prepare("SELECT * FROM tbl_necessidade
                                                INNER JOIN tbl_paciente ON tbl_necessidade.Cpf = tbl_paciente.Cpf
                                                WHERE tbl_necessidade.Necessidade='$espec'");
    $Ficha->execute();
    $linhas = $Ficha->fetchAll(PDO::FETCH_OBJ);    
    foreach ($linhas as $listar) {
      echo "
        <tr>
          <td>".$listar->Nome."</td>
          <td>".$listar->Data_Nascimento."</td>
          <td>".$listar->Rg."</td>
          <td>".$listar->Cpf."</td>
          <td>".$listar->Necessidade."</td>
          <td><a href='../Search/VerFicha.php?id=".$listar->Cpf."'>Ver Ficha</a></td>
        </tr>




      

      ";
    }    
    
  }
  public function PacienteEmTratamento()
  {
    $Ficha = $this->conn->prepare("SELECT * FROM tbl_paciente
                                                INNER JOIN tbl_grupotrat ON tbl_paciente.Cpf = tbl_grupotrat.Cpf
                                                WHERE tbl_grupotrat.Status='Em Tratamento'");
    $Ficha->execute();
    $linhas = $Ficha->fetchAll(PDO::FETCH_OBJ);    
    foreach ($linhas as $listar) {
      echo "
        <tr>
          <td>".$listar->Nome."</td>
          <td>".$listar->Grupo."</td>
          <td>".$listar->Cpf."</td>
          <td>Ver Tratamento</td>
        </tr>

      ";
    }    
    
  }

  public function PacienteConcluidos()
  {
    $Ficha = $this->conn->prepare("SELECT * FROM tbl_paciente
                                                INNER JOIN tbl_grupotrat ON tbl_paciente.Cpf = tbl_grupotrat.Cpf
                                                WHERE tbl_grupotrat.Status='Concluído'");
    $Ficha->execute();
    $linhas = $Ficha->fetchAll(PDO::FETCH_OBJ);    
    foreach ($linhas as $listar) {
      echo "
        <tr>
          <td>".$listar->Nome."</td>
          <td>".$listar->Grupo."</td>
          <td>".$listar->Cpf."</td>
          <td>Ver Tratamento</td>
        </tr>

      ";
    }    
    
  }
  public function GrupoFicha($cpf)
  {
    $Tratamento = $this->conn->prepare("SELECT * FROM tbl_grupotrat WHERE Cpf='$cpf'");
    $Tratamento->execute();
    $linhas = $Tratamento->fetchAll(PDO::FETCH_OBJ); 
    echo " 
      <div class='list-group my-2'>
        "; 
    foreach ($linhas as $listar) {
      if ($listar->Status == 'Concluído') {
        $cor = 'list-group-item-success';
      }elseif ($listar->Status == 'Em Tratamento') {
        $cor = 'list-group-item-danger';
      }
      echo "
        <a  class='list-group-item ".$cor." list-group-item-action'><b>".$listar->Grupo." / ".$listar->Status." </b></a>
      
      ";
    }  
    echo "</div>";    
  }
}
?><!-- <div class='list-group '>
      <a class=' bg-success text-light list-group-item list-group-item-action flex-column align-items-start active'>
        <div class='d-flex w-100 justify-content-between'>
          <h5 class='mb-1'>Cabeçalho do item</h5>
          <small>3 dias atrás</small>
        </div>
        <p class='mb-1'>Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
        <small>Donec id elit non mi porta.</small>
      </a> 
    </div>-->
  