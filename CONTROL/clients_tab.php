<?php
	require_once('../control/core.php');
	require_once('../vue/haut.php');
	require_once('../vue/aside.php');
	$rech='';
	
	if(isset($_POST['ZONE_RECH_USER'])){
		$rech =$_POST['ZONE_RECH_USER'];
	}
	echo vue::rtv_Zone_Rech("../control/clients_tab.php","ZONE_RECH_USER",$rech,"Rechercher un client");
	
	require_once('../control/clients_tab_ajax.php');
	require_once('../vue/bas.php');
?>
