<?php 
require_once('../ClassesDAO/DentistaDAO.php');
$Mudar = new DentistaDAO();
$Mudar->ModalEtapasC($_GET['id'],$_GET['grupo']);

 ?>