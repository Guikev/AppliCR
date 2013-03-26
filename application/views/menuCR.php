<html>
<head>
	<title>GSB : Suivi de la Visite médicale </title>
	<link href="./css/style.css" rel="stylesheet" type="text/css" />
	<?php echo meta('Content-type','text/html; charset=utf-8', 'equiv');?>
	<script language="javascript">
		function selectionne(pValeur, pSelection,  pObjet) {
			//active l'objet pObjet du formulaire si la valeur s�lectionn�e (pSelection) est �gale � la valeur attendue (pValeur)
			if (pSelection==pValeur) 
				{ formRAPPORT_VISITE.elements[pObjet].disabled=false; }
			else { formRAPPORT_VISITE.elements[pObjet].disabled=true; }
		}
	</script>
	<script language="javascript">
        function ajoutLigne( pNumero){//ajoute une ligne de produits/qt� � la div "lignes"     
			//masque le bouton en cours
			document.getElementById("but"+pNumero).setAttribute("hidden","true");	
			pNumero++;										//incr�mente le num�ro de ligne
            var laDiv=document.getElementById("lignes");	//r�cup�re l'objet DOM qui contient les donn�es
			var titre = document.createElement("label") ;	//cr�e un label
			laDiv.appendChild(titre) ;						//l'ajoute � la DIV
			titre.setAttribute("class","titre") ;			//d�finit les propri�t�s
			titre.innerHTML= "   Produit : ";
			var liste = document.createElement("select");	//ajoute une liste pour proposer les produits
			laDiv.appendChild(liste) ;
			liste.setAttribute("name","PRA_ECH"+pNumero) ;
			liste.setAttribute("class","zone");
			//remplit la liste avec les valeurs de la premi�re liste construite en PHP � partir de la base
			liste.innerHTML=formRAPPORT_VISITE.elements["PRA_ECH1"].innerHTML;
			var qte = document.createElement("input");
			laDiv.appendChild(qte);
			qte.setAttribute("name","PRA_QTE"+pNumero);
			qte.setAttribute("size","2"); 
			qte.setAttribute("class","zone");
			qte.setAttribute("type","text");
			var bouton = document.createElement("input");
			laDiv.appendChild(bouton);
			//ajoute une gestion �venementielle en faisant �voluer le num�ro de la ligne
			bouton.setAttribute("onClick","ajoutLigne("+ pNumero +");");
			bouton.setAttribute("type","button");
			bouton.setAttribute("value","+");
			bouton.setAttribute("class","zone");	
			bouton.setAttribute("id","but"+ pNumero);				
        }
    </script>
	
</head>

<body bgcolor="white" text="5599EE">

<div name="haut" style="margin: 2 2 2 2 ;height:6%;">
	<h1> <?php echo img(array('src'=>'img/logo.jpg', 'width'=>'100', 'height'=>'60')); ?> Gestion des visites</h1>
</div>

<div name="gauche" style="float:left;width:18%; background-color:white; height:100%;">
	<h2>Outils</h2>
	<ul><li>Comptes-Rendus</li>
		<ul>
			<li><?php echo anchor('menu/rapport_visite','Nouveaux')?></li>
			<li>Consulter</li>
		</ul>
		<li>Consulter</li>
		<ul>
			<li><?php echo anchor('c_medicament','Médicaments')?></li>
			<li><?php echo anchor('c_praticien','Praticiens')?></li>
			<li><?php echo anchor('visiteur', 'Autres visiteurs'); ?></li>
		</ul>
		<?php if($id != false) 
		{
			echo '<li>'.anchor('connexion/deconnexion', 'D�connexion').'</li>';
		}?>
	</ul>
</div>

