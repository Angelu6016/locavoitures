<?php
	require_once('../control/core.php');
	require_once('../vue/haut.php');
	require_once('../vue/aside.php');
	$rech='';
	
	if(isset($_POST['RECH_FIC'])){
		$rech =$_POST['RECH_FIC'];
	}
	
	require_once('../vue/utilisateurs_fic.php');
	//require_once('../control/utilisateurs_tab_ajax.php');
	require_once('../vue/bas.php');
?>