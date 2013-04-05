<?php
/**
 * Le model m_rapport_visite permet de verifier le formulaire du compte rendu
 * d'un visiteur et son enregistrement dans la base de données.
 *
 * @author: Guidé Kevin
 *
 */

class M_Rapport_visite extends CI_Model
{


	//Enregistre un nouveau rapport de visite dans la base de données avec les valeurs du
	//formulaire récuperées par post
	function set_rapportVisite()
	{
		$numero = $this->input->post('RAP_NUM');
		$dateVisite = $this->input->post('RAP_DATEVISITE');
		$praticien = $this->input->post('lstPrat');
		$coef = $this->input->post('PRA_COEFF');
		$bilan = $this->input->post('RAP_BILAN');
		$produit1 = $this->input->post('PROD1');
		
		
		if($this->input->post('checkboxProduit2'))
		{
			$produit2 = $this->input->post('PROD2');
		}
		else
		{
			$produit2 = null;
		}
		
		
		if($this->input->post('checkboxDate'))
		{
			$dateCR = $this->input->post('RAP_DATE');
		}
		else
		{
			$dateCR = null;
		}
		
		
		if($this->input->post('RAP_MOTIF') == "Autre")
		{
			$motif = $this->input->post('autre');
		}
		else
		{
			$motif = $this->input->post('RAP_MOTIF');
		}
		
		
		if($this->input->post('checkboxRemplacant'))
		{
			$remplacant = $this->input->post('lstRemp');
		}
		else
		{
			$remplacant = null;
		}
		
		
		if($this->input->post('RAP_DOC'))
		{
			$doc = 1;
		}
		else
		{
			$doc = 0;
		}
		
		
		if($this->input->post('RAP_LOCK'))
		{
			$definitif = 1;
		}
		else
		{
			$definitif = 0;
		}
		
		
		$matricule = $this->session->userdata('idConnecte');
		$sql = "INSERT INTO `rapport_visite` (`VIS_MATRICULE`, `RAP_NUM`, `DATE_VISITE`, `PRA_NUM`, `COEF`, `PRA_REMPL`, `RAP_DATE`, `RAP_BILAN`, `RAP_MOTIF`, `MED1_PRES`, `MED2_PRES`, `DOC`, `RAP_DEFINITIF`) VALUES ('$matricule', '$numero', '$dateVisite', '$praticien', '$coef', '$remplacant', '$dateCR', '$bilan', '$motif', '$produit1', '$produit2', $doc, $definitif) ";
	
		$query = $this->db->query($sql);
		
		
		//Vérifie si le champ de la quantité du premier echantillon est vide ou non
		//Si non, on parcours tous les input du formulaire et on vérifie l'existance d'autre champs pour la quantité d'un autre echantillon
		//A chaque nouveau champ de quantité d'un nouvel echantillon, on insère dans la table offrir le medicament choisi et la quantité rentrée
		
		if ($this->input->post('PRA_QTE1') != null)
		{
			$i=1;
			
			//Parcours tous les input du formulaire
			foreach($_POST as $inputName => $inputValue)
			{
				$medEch = "PRA_ECH".$i;
				$medQte = "PRA_QTE".$i;
		
				$echantillon = $this->input->post($medEch);
				$qte = $this->input->post($medQte);
		
				//Vérifie si le nom du input commence par PRA_QTE (si c'est un champ pour la quantité d'un echantillon)
				//Si oui, execute la requete SQl pour remplir la table offrir avec le matricule de l'utilisateur connecté, le numero de rapport, le médicament choisi et la nombre d'échantillon
				if(substr($inputName,0,7) == "PRA_QTE")
				{
					$sql2 = "INSERT INTO `offrir` (`VIS_MATRICULE`, `RAP_NUM`, `MED_DEPOTLEGAL`, `OFF_QTE`) VALUES ('$matricule', '$numero', '$echantillon', '$qte')";
					$query = $this->db->query($sql2);
					$i++;
				}
			}
		}

	}
}

//FIN
//Classe