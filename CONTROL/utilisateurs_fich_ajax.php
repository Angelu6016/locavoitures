<?php
	require_once('../control/core.php');
		if(isset($_POST['RECH_FICH'])){
		$rech = $_POST['RECH_FICH'];
	}
	$utilisateurs=Model::load("utilisateurs");
	$utilisateurs->id[0]=$_POST['RECH_FICH'];
	$utilisateurs->read('utilisateur "#", code "Code ", nom "Nom" , prenom "Prénom", admin "admin", actif "Actif" ',$rech);
	require_once('../vue/utilisateurs_fich.php');
?>  