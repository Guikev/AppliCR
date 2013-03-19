
<div name="droite" style="float:left;width:80%;">
	<div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
	
		<?php echo form_open('c_rapportVisite',array('id'=>'formRAPPORT_VISITE' ,'name'=>'formRAPPORT_VISITE'))?>
		<form name="formRAPPORT_VISITE" method="post" action="recupRAPPORT_VISITE.php">
			<h1> Rapport de visite </h1>
			<label class="titre">NUMERO :</label>
			<input type="text" size="10" name="RAP_NUM" class="zone" />
			
			<label class="titre">DATE VISITE :</label>
			<input type="text" size="10" name="RAP_DATEVISITE" class="zone" />
			
			<label class="titre">PRATICIEN :</label>
			<select  name="PRA_NUM" class="zone" ></select>
			
			<label class="titre">COEFFICIENT :</label>
			<input type="text" size="6" name="PRA_COEFF" class="zone" />
			
			<label class="titre">REMPLACANT :</label>
			<input type="checkbox" class="zone" checked="false" onClick="selectionne(true,this.checked,'PRA_REMPLACANT');"/><select name="PRA_REMPLACANT" disabled="disabled" class="zone" ></select>
			
			<label class="titre">DATE :</label>
			<input type="text" size="19" name="RAP_DATE" class="zone" />
			
			<label class="titre">MOTIF :</label>
			<select  name="RAP_MOTIF" class="zone" onClick="selectionne('AUT',this.value,'RAP_MOTIFAUTRE');">
				<option value="PRD">P�riodicit�</option>
				<option value="ACT">Actualisation</option>
				<option value="REL">Relance</option>
				<option value="SOL">Sollicitation praticien</option>
				<option value="AUT">Autre</option>
			</select><input type="text" name="RAP_MOTIFAUTRE" class="zone" disabled="disabled" />
			
			<label class="titre">BILAN :</label>
			<textarea rows="5" cols="50" name="RAP_BILAN" class="zone" ></textarea>
			
			<label class="titre" ><h3> El�ments pr�sent�s </h3></label>
			<label class="titre" >PRODUIT 1 : </label>
			<select name="PROD1" class="zone"></select>
			
			<label class="titre" >PRODUIT 2 : </label>
			<select name="PROD2" class="zone"></select>
			
			<label class="titre">DOCUMENTATION OFFERTE :</label>
			<input name="RAP_DOC" type="checkbox" class="zone" checked="false" />
			
			<label class="titre"><h3>Echanitllons</h3></label>
			
			<div class="titre" id="lignes">
				<label class="titre" >Produit : </label>
				<select name="PRA_ECH1" class="zone"><option>Produits</option></select>
				<input type="text" name="PRA_QTE1" size="2" class="zone"/>
				<input type="button" id="but1" value="+" onclick="ajoutLigne(1);" class="zone" />			
			</div>	
				
			<label class="titre">SAISIE DEFINITIVE :</label>
			<input name="RAP_LOCK" type="checkbox" class="zone" checked="false" />
			
			<label class="titre"></label><div class="zone">
			<input type="reset" value="annuler"></input><input type="submit"></input>
			
		</form>
	</div>
</div>
</body>
</html>