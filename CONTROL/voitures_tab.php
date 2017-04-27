<?php
	require_once('../control/core.php');
	require_once('../vue/haut.php');
	require_once('../vue/aside.php');

	$voitures=Model::load("voitures");

	$voitures->read();

	require_once('../vue/voitures_tab.php');

	require_once('../vue/bas.php');
?>