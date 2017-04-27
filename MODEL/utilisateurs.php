<?php
class utilisateurs extends Model{
	var $table = "utilisateurs";	
	var $id ;
	var $PK=array("utilisateur");
	var $data ; 
	var $Rech=array("nom", "prenom","admin","Actif"); // colonne sur lesquelles on va faire des recherches
}

?>