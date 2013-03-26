
<div name="droite" style="float:left;width:80%;">
	<div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
		<h1> Praticiens </h1>
		
		<?php echo form_open('c_praticien/choix', array('id'=>'formListeRecherche', 'name'=>'formListeRecherche', 'method'=>'post', 'action'=>'c_praticien'))?>

			<select id="lstPrat" name="lstPrat" class="titre" >
				<option>Choisissez un praticien</option>

				<?php foreach ($praticien as $p){?>
				
					<option name="<?php echo $p->PRA_NUM?>" value="<?php echo $p->PRA_NUM?>"><?php echo $p->PRA_NOM?></option>
				<?php }	?>
			</select>
				<?php echo form_button(array('name'=>'cmdChercher','id'=>'cmdChercher', 'type'=>'submit', 'content'=>'chercher'))?>
				
		<?php 	echo form_close();
				if ( isset($selection))
				{
		?>
		
					<label class="titre">NUMERO :</label><label size="5" name="PRA_NUM" class="zone" value=""><?php echo $selection->PRA_NUM ?></label>
					<?php echo br(1)?>
					<label class="titre">NOM :</label><label size="25" name="PRA_NOM" class="zone" ><?php echo $selection->PRA_NOM ?></label>
					<?php echo br(1)?>
					<label class="titre">PRENOM :</label><label size="30" name="PRA_PRENOM" class="zone" ><?php echo $selection->PRA_PRENOM ?></label>
					<?php echo br(1)?>
					<label class="titre">ADRESSE :</label><label size="50" name="PRA_ADRESSE" class="zone" ><?php echo $selection->PRA_ADRESSE ?></label>
					<?php echo br(1)?>
					<label class="titre">CP :</label><label size="5" name="PRA_CP" class="zone" ><?php echo $selection->PRA_NUM ?></label>
					<?php echo br(1)?>
					<label class="titre">COEFF. NOTORIETE :</label><label size="7" name="PRA_COEFNOTORIETE" class="zone" ><?php echo $selection->PRA_COEFNOTORIETE ?></label>
					<?php echo br(1)?>
					<label class="titre">TYPE :</label><label size="3" name="TYP_CODE" class="zone" ><?php echo $selection->TYP_CODE ?></label>
					<?php echo br(1)?>
					<label class="titre">&nbsp;</label><div class="zone">
					<?php echo form_open("c_praticien/parcourir", array('id'=>'precedent'))?>
					<input type="submit" name="precedent" value= "&lt" ></input>
					<input type="hidden" name="precedent" value=<?php echo $precedent?> ></input>
					<?php echo form_close();?>
					<?php echo form_open("c_praticien/parcourir", array('id'=>'suivant'))?>
					<input type="submit" name="suivant" value= "&gt" ></input>
					<input type="hidden" name="suivant" value=<?php echo $suivant ?> ></input>
					<?php echo form_close();}?>
					</div>
				

				
	</div>
</div>
