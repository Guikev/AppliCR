
<div name="droite" style="float:left;width:80%;heigth:100%">
	<div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:110%;">
		
		<?php
		echo validation_errors();
		?>
		
		<?php echo form_open('c_rapport_visite/ajouterCR',array('id'=>'formRAPPORT_VISITE' ,'name'=>'formRAPPORT_VISITE'))?>
		<form name="formRAPPORT_VISITE" method="post" action="recupRAPPORT_VISITE.php">
			<h1> Rapport de visite</h1>
			<label class="titre">NUMERO :</label>
			<input type="text" size="10" name="RAP_NUM" class="zone" /> *
			<br /><br />
			
			<label class="titre">DATE VISITE :</label>
			<input type="text" size="10" name="RAP_DATEVISITE" class="zone" /> *
			<br /><br />
			
			<label class="titre">PRATICIEN :</label>
			<select id="lstPrat" name="lstPrat" class="titre" >
				<?php foreach ($praticien as $p){?>
					<option name="<?php echo $p->PRA_NUM?>" value="<?php echo $p->PRA_NUM?>"><?php echo $p->PRA_NOM?></option>
				<?php }	?>
			</select> *

			<br /><br />
			
			<label class="titre">COEFFICIENT :</label>
			<input type="text" size="6" name="PRA_COEFF" class="zone" /> *
			<br /><br />
			
			<input name="checkboxRemplacant" type="checkbox" class="zone" checked="false" onClick="selectionne(true,this.checked,'lstRemp');"/>
			<label class="titre">REMPLACANT :</label>
			<select id="lstRemp" name="lstRemp" class="titre" >
				<?php foreach ($praticien as $p){?>
					<option name="<?php echo $p->PRA_NUM?>" value="<?php echo $p->PRA_NUM?>"><?php echo $p->PRA_NOM?></option>
				<?php }	?>
			</select>
			<br /><br />
			
			<input name="checkboxDate" type="checkbox" class="zone" checked="false" onClick="selectionne(true,this.checked,'RAP_DATE');"/>
			<label class="titre">DATE COMPTE RENDU :</label>
			<input type="text" size="19" name="RAP_DATE" class="zone" />
			<br /><br />
			
			<label class="titre">MOTIF :</label>
			<select  name="RAP_MOTIF" class="zone" onClick="selectionne('AUT',this.value,'RAP_MOTIFAUTRE');">
				<option value="PRD">Périodicité</option>
				<option value="ACT">Actualisation</option>
				<option value="REL">Relance</option>
				<option value="SOL">Sollicitation praticien</option>
				<option value="AUT">Autre</option>
			</select> *
			<br /><br />
			
			<label class="titre">BILAN :</label>
			<textarea rows="5" cols="50" name="RAP_BILAN" class="zone" ></textarea> *
			<br /><br />
			
			<label class="titre" ><h3> Eléments présentés </h3></label>
			<label class="titre" >PRODUIT 1 : </label>
			<select name="PROD1" class="zone">
				<?php foreach ($medicament as $m){?>
					<option name="<?php echo $m->MED_DEPOTLEGAL?>" value="<?php echo $m->MED_DEPOTLEGAL?>"><?php echo $m->MED_NOMCOMMERCIAL?></option>
				<?php }	?>
			</select> *
			
			<input name="checkboxProduit2" type="checkbox" class="zone" checked="false" onClick="selectionne(true,this.checked,'PROD2');"/>
			<label class="titre" >PRODUIT 2 : </label>
			<select name="PROD2" class="zone">
				<?php foreach ($medicament as $m){?>
					<option name="<?php echo $m->MED_DEPOTLEGAL?>" value="<?php echo $m->MED_DEPOTLEGAL?>"><?php echo $m->MED_NOMCOMMERCIAL?></option>
				<?php }	?>
			</select>
			<br /><br />
			
			<label class="titre">DOCUMENTATION OFFERTE :</label>
			<input name="RAP_DOC" type="checkbox" class="zone" checked="false" />
			
			<label class="titre"><h3>Echantillons</h3></label>
			
			<div class="titre" id="lignes">
			<input type="checkbox" class="zone" checked="false" onClick="selectionne(true,this.checked,'PRA_ECH1');"/>
				<label class="titre" >Produit : </label>
				<select name="PRA_ECH1" class="zone">
					<?php foreach ($medicament as $m){?>
						<option name="<?php echo $m->MED_DEPOTLEGAL?>" value="<?php echo $m->MED_DEPOTLEGAL?>"><?php echo $m->MED_NOMCOMMERCIAL?></option>
					<?php }	?>
				</select>
				<input type="text" name="PRA_QTE1" size="2" class="zone"/>
				<input type="button" id="but1" value="+" onclick="ajoutLigne(1);" class="zone" />			
			</div>
			<br /><br />
				
			<label class="titre">SAISIE DEFINITIVE :</label>
			<input name="RAP_LOCK" type="checkbox" class="zone" checked="false" />
			<br /><br />
			
			<label class="titre"></label><div class="zone">
			<input type="reset" value="annuler"></input>
			<input type="submit" name="envoyer"></input>
			(* champs obligatoires)
			
		</form>
	</div>
</div>
</body>
</html>