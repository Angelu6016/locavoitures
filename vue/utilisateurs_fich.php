<section>
	<article>
	<h3>Fiche individuelle</h3>
	<?php 
		echo Vue::rtv_Fiche($utilisateurs,$rech,"../CONTROL/utilisateurs_fich.php");
	?>
    <br>
    <form action="../CONTROL/utilisateurs_tab.php" method="post" accept-charset="utf-8">
	<input type="submit" name="" value="Retour">
	</form>
	</article>
</section>
	