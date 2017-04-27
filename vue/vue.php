<?php 
//----------------------------------------------------------------------------------
class Vue{
	public static function rtv_Table($pParam){
		$out  = "";
		$titre= '<tr>';
		$titre_trt= false;
		$button='<form action="../Control/utilisateurs_fich.php" method="post">'.'<input type="submit" name="btn_voir" value="Voir">'.
		'<input type="text" name="login" value=" '.$pParam.' " >'.'</form>';

		foreach($pParam->data as $key => $element){
			$out .= "<tr>";
			foreach($element as $subkey => $subelement){
				if($titre_trt==false){
					$titre .= '<th>'.$subkey.'</th>' ;	
				}
				$out .= '<td>'.$subelement.'</td>' ;
			}
			$out .= '<td>'.$button.'</td>' ;
			if($titre_trt==false) { $titre.= '</tr>'; }
			$titre_trt= true;
			$out .= "</tr>";
		}
		$out = '<table>'.$titre.$out.'</table>';
		return $out;
	}
//-----------------------------------------------------------------------------------------------------	
	public static function rtv_Fiche($pParam){
		$out  = "";
		foreach($pParam->data as $key => $element){
			foreach($element as $subkey => $subelement){
				$out .= "<tr>";
				$out .= '<th>'.$subkey.'</th>' ;
				$out .= '<td>'.$subelement.'</td>' ;
				$out .= "</tr>";
			}
		}
		$out = '<table>'.$out.'</table>';
		return $out;
	}

//----------------------------------------------------------------------------------------------------
	public static function rtv_Zone_Rech($pAction,$pTous,$pInactifs,$pActifs,$pNom,$pRechVal,$pPlaceHolder){
		//$ValRetour = '<section>';
		//$ValRetour .= '<article>';
		$ValRetour = '<form action= " '.$pAction.' " method="post" accept-charset="utf-8">';
		$ValRetour .= '<p><input type="radio" name="etat" value="'.$pTous.'" >Tous';
		$ValRetour .= '<input type="radio" name="etat" value="'.$pInactifs.'"> Inactifs';
		$ValRetour .= '<input type="radio" name="etat"  value="'.$pActifs.'"> Actifs</p>';
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