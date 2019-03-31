<?php 
require_once('../ClassesDAO/DentistaDAO.php');
$Mudar = new DentistaDAO();
$Mudar->ExcluirSaude($_GET['exid']);
//var_dump($_GET['Status'],$_GET['cpf']);
echo "<script language= 'JavaScript'>location.href='../SaudePaciente.php?nome=".$_GET['nome']."&id=".$_GET['id']."';</script>";

 ?>