<?php 
class Vue{
	public static function rtv_Table($pParam,$pNom='', $pColID='', $pAction= ''){
		$out  = "";
		$titre= '<tr>';
		$titre_trt= false;

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
					$colForm .= '<input type="hidden" name="RECH_FICH" value=" '.$subelement.' " >';
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
		$out = '<section ID="RESULT_'.$pNom.'"><article><table>'.$titre.$out.'</table></article></section>';
		return $out;
	}
//-----------------------------------------------------------------------------------------------------	
	public static function rtv_Fiche($pParam,$pID){
		$out  = "";
		foreach($pParam ->data as $key => $element){
			foreach($element as $subkey => $subelement){
				//	if($subelement==$pID){
						$out .= "<tr>";
						$out .= '<th>'.$subkey.'</th>' ;
						$out .= '<td>'.$subelement.'</td>' ;
						$out .= "</tr>";
				//	}
			}
		}
		$out = '<table>'.$out.'</table>';
		return $out;
	}

//----------------------------------------------------------------------------------------------------
	public static function rtv_Zone_Rech($pAction,$pNom,$pRechVal,$pPlaceHolder){
		//$ValRetour = '<section>';
		//$ValRetour .= '<article>';
		$ValRetour = '<form action= " '.$pAction.' " method="post" accept-charset="utf-8">';
		$ValRetour .= '<input type="text" name="'.$pNom.'" value="'.$pRechVal.'" placeholder="'.$pPlaceHolder.'">';
		$ValRetour .= '<input type="submit" name="" value="Rechercher">';
		$ValRetour .= '</form>';
		//$ValRetour .= '</article>';
		//$ValRetour .= '</section>';
		return $ValRetour;
	
	}
//----------------------------------------------------------------------------------------------------	
}
?>
