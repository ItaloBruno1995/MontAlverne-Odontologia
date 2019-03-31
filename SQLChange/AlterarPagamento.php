<?php 
require_once('../ClassesDAO/SecretariaDAO.php');
$Mudar = new SecretariaDAO();
$Mudar->AlterarStatusFinanceiro($_GET['Status'],$_GET['cpf']);
//var_dump($_GET['Status'],$_GET['cpf']);
echo "<script language= 'JavaScript'>location.href='../Pagamentos.php?nome=".$_GET['nome']."&id=".$_GET['id']."';</script>";

 ?>