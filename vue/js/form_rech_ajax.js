var visuPopup = function(event){
	/* Je récupère l'élément sur lequel j'ai cliqué*/
	var elem=$( this );

	/*Je récupère l'ID ainsi que l'ACTION du formulaire */
	$formValeur = $("input[name='RECH_FICH']",elem).attr("value");
	$formAction = $("form",elem).attr("action");
	$formAction = $formAction.replace('.php', '_ajax.php');

	/*Je fais mon call AJAX et j'affiche le POPUP*/
	$.post( $formAction, { RECH_FICH : $formValeur })
  		.done(function( data ) {

			var monHTML="\
						<div id=\"popup1\" class=\"overlay\"> \
							<div class=\"popup\"> \
								<h2>Description</h2> \
								<a class=\"close\" href=\"#\">&times;</a> \
								<div class=\"content\"> \
									"+data+" \
								</div> \
							</div>\
						</div>";
						
			$('body'	).append(monHTML);

			$('.close').on("click",function(event) {
				$('#popup1').remove();
			});
  		});
};
//------------------------------------------------------------------------------------------
$( '.POPUPFORM' ).each(function(index) { $(this).on("click", visuPopup); });
