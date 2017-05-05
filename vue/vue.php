<?php 
//----------------------------------------------------------------------------------
class Vue{
	public static function rtv_Table($pParam,$pID,$pDestination,$pNom=' '){
		$out  = "";
		$titre= '<tr>';
		$titre_trt= false;
		$Button='';

		
		foreach($pParam->data as $key => $element){
			$out .= "<tr>";
			foreach($element as $subkey => $subelement){
				if($titre_trt==false){
					$titre .= '<th>'.$subkey.'</th>' ;	
				}
				$out .= '<td>'.$subelement.'</td>' ;

				if($subkey==$pID){
					$Button='<form action=" '.$pDestination.' " method="post">'.'<input type="submit" value="Voir">'.
					'<input type="text" name="RECH_FICH" value=" '.$subelement.' " >'.'</form>';

				}
				
			}
			$out .= '<td>'.$Button.'</td>' ;
			
			if($titre_trt==false) { $titre.= '</tr>'; }
			$titre_trt= true;
			$out .= "</tr>";
		}
		$out = '<section ID="RESULT_'.$pNom.' "><article><table>'.$titre.$out.'</table></article></section>';
		
		return $out;
	}
//-----------------------------------------------------------------------------------------------------	
	public static function rtv_Fiche($pParam,$pID,$pDestination){
		$out  = "";
		foreach($pParam->data as $key => $element){
				if($element==$pID){
					foreach($element as $subkey => $subelement){
						$out .= "<tr>";
						$out .= '<th>'.$subkey.'</th>' ;
						$out .= '<td>'.$subelement.'</td>' ;
						$out .= "</tr>";
					}
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