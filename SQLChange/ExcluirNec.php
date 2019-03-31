<?php 
require_once('../ClassesDAO/DentistaDAO.php');
$Mudar = new DentistaDAO();
$Mudar->ExcluirNec($_GET['exid']);
//var_dump($_GET['Status'],$_GET['cpf']);
echo "<script language=\"javascript\">window.history.back();</script>";

 ?>