<?php 
class Vue{
	public static function rtv_Table($pParam,$pNom='', $pColID='', $pAction= ''){
		$out  = "";
		$formNouveau="";

		$formNouveau .= '<form action="'.$pAction.'" method="post" accept-charset="utf-8">';
		$formNouveau .= '<input type="hidden" name="FormFicheAjout" value="1" >';
		$formNouveau .= '<input type="submit" name="" value="NOUVEAU">';
		$formNouveau .= '</form>';
		

		$titre = '<tr>';
		$titre_trt = false;

		foreach($pParam->data as $key => $element){
			$out .= '<tr class="POPUPFORM">';
			$colForm = '';
			foreach($element as $subkey => $subelement){
				if($titre_trt==false){
					$titre .= '<th>'.$subkey.'</th>' ;	
				}
				if ($pColID != '' && $pAction != '' && $subkey == $pColID){
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
		$out = '<section ID="RESULT_'.$pNom.'"><table>'.$titre.$out.'</table><br>'.$formNouveau.'</section>';
		return $out;
	}
//-----------------------------------------------------------------------------------------------------	
	public static function rtv_Fiche($pParam,$pAction="",$pPK="",$pMode="MODIF"){
		$out ="";
		$pAnnule = '../CONTROL/utilisateurs_tab.php';
		
		$out .= '<form method="post" action="'.$pAction.'">';
		$out .= '<input type="hidden" name="FormFiche" value="1">';
		$out .= '<input type="hidden" name="FormModeAjax" value="0">';
		$out .= '<input type="hidden" name="MODE" value="'.$pMode.'">';
		
		foreach($pParam ->data as $key => $element){
			foreach($element as $subkey => $subelement){
				$varReadOnly="";
				if ($subkey==$pPK) {
					$varReadOnly="readonly";
				}
				
				$out .= '<p ><label for="'.$subkey.'" class="FormFiche">'.$subkey.'</label> :';
				$out .='<input id="alignForm" type="text" name="'.$subkey.'"  value="'.$subelement.'"'.$varReadOnly.'/></p>';
			}
		}
		$out .= '<input type="submit" name="VALIDER" value="Valider">';
		$out .= '</form>';
		$out .= '<form id="btnAnnule" method="post" action="../CONTROL/utilisateurs_tab.php">';
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
