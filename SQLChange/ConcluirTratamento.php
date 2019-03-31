<?php 
require_once('../ClassesDAO/DentistaDAO.php');
$Mudar = new DentistaDAO();
$Mudar->ConcluirTratamento($_POST['trat'],$_GET['grupo']);
//var_dump($_GET['Status'],$_GET['cpf']);
echo "<script language= 'JavaScript'>location.href='../PlanoTratamento.php?nome=".$_GET['nome']."&id=".$_GET['id']."';</script>";

 ?>