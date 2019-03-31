<?php 
require_once('../ClassesDAO/DentistaDAO.php');
$Tratamento = new DentistaDAO();

$Tratamento->NovaNecessidade(@$_POST['nec'],@$_POST['id']);
echo "<script language=\"javascript\">window.history.back();</script>";
?>