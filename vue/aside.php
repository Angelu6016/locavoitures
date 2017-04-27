	<aside class="aside">
    	<article>
        <h2>Authentification</h2>
		<form action="../control/login_control.php" method="post" accept-charset="utf-8">
			<input type="text" name="UTILISATEUR" value="" placeholder="Login" required><br><br>
			<input type="password" name="CODE" value="" placeholder="Mot de passe" required><br><br>
			<input type="submit" name="" value="Go">
		</form>
		<?php if (isset($_SESSION['ERROR_LOGIN'])){
			echo "<p>".$_SESSION['ERROR_LOGIN']."</p>";
		} ?>
		</article>
		<h2>Point d'informations</h2>
		
	</aside>
