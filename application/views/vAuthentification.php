
<div name="droite" style="float:left;width:80%;background-color:77AADD;">
	<div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
	<h1> Connexion :  </h1>
		<div style="color:ff0000;">
		<?php
		echo validation_errors();
		echo $erreur;
		?>
		</div>
		<?php
		echo form_open('connexion',array('method'=>'post','name'=>'connection'));
		
		echo form_label('Identifiant : ','identifiant');
		echo form_input('identifiant',set_value('identifiant')).br(2);
		echo form_label('Mot de passe : ','password');
		echo form_password('password').br(2);
		echo form_submit('connecter','Connexion');
		echo form_close();
		?>
	</div>
</div>
