
	<div name="droite" style="float:left;width:80%;">
		<div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
			<h1> Pharmacopee </h1>
			
			<?php echo form_open('c_medicament',array('id'=>'formMEDICAMENT' ,'name'=>'formMEDICAMENT'))?>
			<form name="formMEDICAMENT" method="post" action="formMEDICAMENT.php">

					<label class="titre">DEPOT LEGAL :</label>
					<input type="text" size="10" name="MED_DEPOTLEGAL" class="zone" value="<?php echo $m[0]['MED_DEPOTLEGAL']?>"/>
					<?php echo br(2)?>
					<label class="titre">NOM COMMERCIAL :</label>
					<input type="text" size="25" name="MED_NOMCOMMERCIAL" class="zone" value="<?php echo $m[0]['MED_NOMCOMMERCIAL']?>"/>
					<?php echo br(2)?>
					<label class="titre">FAMILLE :</label>
					<input type="text" size="3" name="FAM_CODE" class="zone" value="<?php echo $m[0]['FAM_CODE']?>"/>
					<?php echo br(2)?>
					<label class="titre">COMPOSITION :</label><?php echo br(1)?>
					<textarea rows="5" cols="50" name="MED_COMPOSITION" class="zone"><?php echo $m[0]['MED_COMPOSITION']?></textarea>
					<?php echo br(2)?>
					<label class="titre">EFFETS :</label><?php echo br(1)?>
					<textarea rows="5" cols="50" name="MED_EFFETS" class="zone"><?php echo $m[0]['MED_EFFETS']?></textarea>
					<?php echo br(2)?>
					<label class="titre">CONTRE INDIC. :</label><?php echo br(1)?>
					<textarea rows="5" cols="50" name="MED_CONTREINDIC" class="zone"><?php echo $m[0]['MED_CONTREINDIC']?></textarea>
					<?php echo br(2)?>
					<label class="titre">PRIX ECHANTILLON :</label><?php echo br(1)?>
					<input type="text" size="7" name="MED_PRIXECHANTILLON" class="zone" value="<?php echo $m[0]['MED_PRIXECHANTILLON']?>"/>
					<?php echo br(2)?>
					<label class="titre">&nbsp;</label>
					<input type="hidden" name='precedent' value="<?php echo $precedent?>"/>
					<input type="hidden" name='suivant' value="<?php echo $suivant?>"/>
										
					<?php if($precedent!=null){ ?>
						<input class="zone" type="submit" name="p" value="précédent"></input>
					<?php } ?>
					
					<?php if($suivant!=null){?>
						<input class="zone" type="submit" name="s" value="suivant"></input>
					<?php } ?>

			</form>
			
		</div>
	</div>
