	<div name="droite" style="float:left;width:80%;">
		<div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
		<h1> Collaborateurs </h1>
		
		<?php echo form_open('c_visiteur',array('method'=>'post','name'=>'chercher'));?>
			<!-- A dynamiser /!\ -->
			<select name="lstVisiteur" class="zone">
			<?php foreach($lstVis as $v){?>
				<option value="<?php echo $v['VIS_MATRICULE']?>"><?php echo $v['VIS_NOM']." ".$v['Vis_PRENOM']?></option>
			<?php }?> 
			</select>
			<input type="submit" name="chercher" value="chercher" />
		<?php echo form_close();?>
		

		
			<?php echo form_open('c_visiteur',array('method'=>'post','name'=>'formVisiteur'));?>
		
			<label class="titre">NOM :</label><input type="text" size="25" name="VIS_NOM" class="zone" value="<?php echo $leVisiteur['VIS_NOM']?>"/> <br/>
			<label class="titre">PRENOM :</label><input type="text" size="50" name="Vis_PRENOM" class="zone" value="<?php echo $leVisiteur['Vis_PRENOM']?>"/> <br/>
			<label class="titre">ADRESSE :</label><input type="text" size="50" name="VIS_ADRESSE" class="zone" value="<?php echo $leVisiteur['VIS_ADRESSE']?>"/> <br/>
			<label class="titre">CP :</label><input type="text" size="5" name="VIS_CP" class="zone" value="<?php echo $leVisiteur['VIS_CP']?>"/> <br/>
			<label class="titre">VILLE :</label><input type="text" size="30" name="VIS_VILLE" class="zone" value="<?php echo $leVisiteur['VIS_VILLE']?>"/> <br/>
			<label class="titre">SECTEUR :</label><input type="text" size="1" name="SEC_CODE" class="zone" value="<?php echo $leVisiteur['SEC_CODE']?>"/> <br/>
			<label class="titre">&nbsp;</label>
			
			<input  type="hidden" value="<?php echo $precedent ?>" name="hid_precedent"></input>
			<input  type="hidden" value="<?php echo $suivant ?>"   name="hid_suivant"></input>			
			
			<?php if($precedent!=null){?>
			<input class="zone" type="submit" value="&lt" name="precedent"></input>
			<?php } ?>
			<?php if($suivant!=null){?>
			<input class="zone" type="submit" value=">"   name="suivant"></input>
		    <?php }?>
		    <?php echo form_close(); ?>
		    
		</div>
	</div>
</body>

</html>