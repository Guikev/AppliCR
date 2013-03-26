

<div name="haut" style="margin: 2 2 2 2 ;height:6%;"><h1><img src="images/logo.jpg" width="100" height="60"/>Gestion des visites</h1></div>
<div name="gauche" style="float:left;width:18%; background-color:white; height:100%;">
	<h2>Outils</h2>
	<ul><li>Comptes-Rendus</li>
		<ul>
			<li><a href="formRAPPORT_VISITE.php" >Nouveaux</a></li>
			<li>Consulter</li>
		</ul>
		<li>Consulter</li>
		<ul><li><a href="formMEDICAMENT.php" >Médicaments</a></li>
			<li><a href="formPRATICIEN.php" >Praticiens</a></li>
			<li><?php echo anchor('visiteur', 'Autres visiteurs'); ?></li>
		</ul>
		<?php if($id != false) 
		{
			echo '<li>'.anchor('connexion/deconnexion', 'Déconnexion').'</li>';
		}?>
	</ul>
</div>

