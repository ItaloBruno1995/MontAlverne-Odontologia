<?php 
require_once('../ClassesDAO/DentistaDAO.php');
$Mudar = new DentistaDAO();
$Mudar->AlterarStatus($_GET['Status'],$_GET['id']);
//var_dump($_GET['Status'],$_GET['cpf']);

echo "<script language= 'JavaScript'>location.href='../AdicionarTratamento.php?nome=".$_GET['nome']."&id=".$_GET['id']."';</script>";
 ?>