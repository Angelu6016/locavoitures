<?php 
class Vue{
	public static function rtv_Table($pTable,$pNom='', $pColID='', $pAction= ''){
		$out  = "";
		$formNouveau="";
		$formRetour="";
			
		if (strstr($pAction, "utilisateurs") ||strstr($pAction, "voitures") ||strstr($pAction, "clients") ){
			$labelButton = "Nouvelle Fiche";
		}
		else{
			$labelButton = "Nouvelle Réservation";
		}
		$formNouveau .= '<form action="'.$pAction.'" method="post" accept-charset="utf-8">';
		$formNouveau .= '<input type="hidden" name="FormFicheAjout" value="1" >';
		$formNouveau .= '<input type="submit" name="" value="'.$labelButton.'">';
		$formNouveau .= '</form>';
		// bouton de retour
		$pAction2 = str_replace("fich","tab",$pAction);
		$formRetour .= '<form action="'.$pAction2.'" method="post" accept-charset="utf-8">';
		$formRetour .= '<input type="hidden" name="FormFicheAjout" value="1" >';
		$formRetour .= '<input type="submit" name="" value="Retour">';
		$formRetour .= '</form>';
		
		$titre = '<tr>';
		$titre_trt = false;
		
		foreach($pTable->data as $key => $element){
			$out .= '<tr class="POPUPFORM">';
			$colForm = '';
			foreach($element as $subkey => $subelement){
				if($titre_trt==false){
					$titre .= '<th>'.$subkey.'</th>' ;	
				
				}
				if (strstr($pAction, "reservations")){$pColID='id_reserv';}
				if ($pColID != '' && $pAction != '' && $subkey == $pColID){
					//
					$colForm .= '<form action="'.$pAction.'" method="post" accept-charset="utf-8">';
					$colForm .= '<input type="submit" value="Voir">';
					$colForm .= '<input type="hidden" name="RECH_FICH" value="'.$subelement.'" >';
					$colForm .= '</form>';
					$colForm = '<td name="td_form">'.$colForm.'</td>';
				}
				$out .= '<td>'.$subelement.'</td>' ;
			}
			if($titre_trt==false){
				$titre.= '</tr>';
			}
			$titre_trt= true;
			$out .= $colForm."</tr>";
		}
		$out = '<section ID="RESULT_'.$pNom.'"><table>'.$titre.$out.'</table><br>'.$formNouveau.$formRetour.'</section>';
		return $out;
	}
//-----------------------------------------------------------------------------------------------------	

	public static function rtv_Fiche($pParam,$pAction="",$pPK="",$pMode="MODIF"){
		$out ="";
	
		$out .= '<form method="post" action="'.$pAction.'">';
		$out .= '<input type="hidden" name="FormFiche" value="1">';
		$out .= '<input type="hidden" name="FormModeAjax" value="0">';
		$out .= '<input type="hidden" name="MODE" value="'.$pMode.'">';
		
		foreach($pParam ->data as $key => $element){
			//affichage de la table
			foreach($element as $subkey => $subelement){
				$varReadOnly="";
				if ($subkey==$pPK) {
					$varReadOnly="readonly";
				}
				
				$out .= '<p ><label for="'.$subkey.'" class="FormFiche">'.$subkey.'</label> :';
				$out .='<input id="alignForm" type="text" name="'.$subkey.'"  value="'.$subelement.'"'.$varReadOnly.'/>';			
				$out .='</p>';
			}
		}
		$out .= '<input type="submit" name="VALIDER" value="Valider">';
		$out .= '</form>';
		//création du bouton d'annulation.		
		$pAction = str_replace("fich","tab",$pAction);
		$out .= '<form action="'.$pAction.'" method="post" id="btnAnnule">';
		$out .= '<input type="submit" value="Annuler" />';
		$out .= '</form>';		
		return $out;
	}

//----------------------------------------------------------------------------------------------------
	public static function rtv_Zone_Rech($pAction,$pNom,$pRechVal,$pPlaceHolder){
	
		$ValRetour = '<section id="recherche">';
		$ValRetour .= '<form action= " '.$pAction.' " method="post" accept-charset="utf-8">';
		$ValRetour .= '<input type="text" name="'.$pNom.'" value="'.$pRechVal.'" placeholder="'.$pPlaceHolder.'">';
		$ValRetour .= '<input type="submit" name="" value="Rechercher">';
		$ValRetour .= '</form>';
		$ValRetour .= '</section>';
		return $ValRetour;
	
	}
//----------------------------------------------------------------------------------------------------	
}
?>
