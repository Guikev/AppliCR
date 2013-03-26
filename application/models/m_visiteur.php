<?php
/**
 * Le model visiteur permet de récupérer des infos sur les
 * visiteurs à partir de la table Visiteur. 
 * 
 * @author 
 *
 */
class M_Visiteur extends CI_Model
{
	
	/**
	 * Retourne les informations d'un visiteur dont le matricule est passé en paramètre.
	 * 
	 * @param Le matricule d'un visiteur
	 * @return les informations sous forme de tableau d'un visiteur 
	 * 			dont le matricule est passé en paramètre.
	 * 			OU null si le matricule n'est pas dans la base.
	 */
	public function getVisiteur($matricule)
	{
		$this->load->database();
		$res = $this->db->get_where('visiteur', array('VIS_MATRICULE' => $matricule))->result_array();
		
		if(count($res)>0)
		{
			return $res[0];
		}
		else
		{
			return null; 
		}
	}
	
	/**
	 * Renvoie le matricule(cle primaire) du visiteur qui suit
	 * le visiteur dont le matricule est passé en parametre 
	 * 
	 * @param String le matricule d'un visiteur
	 * @return le matricule du medicament suivant
	 * 			OU null si le matricule n'est pas dans la table ou s'il n'y a pas de suivant
	 */
	public function suivant($matricule)
	{	
		$this->load->database();
		$req="SELECT * FROM visiteur";
		
		$res = $this->db->query($req);
		$resTab = $res->result_array();
		
		$i=0;
		$trouve=false;
		while($i<$res->num_rows() && !$trouve)
		{
			$trouve = $resTab[$i]['VIS_MATRICULE']==$matricule;
			$i++;
		}
		if($i==$res->num_rows() || !$trouve)
		{
			return null;
		}
		else
		{
			return $resTab[$i]['VIS_MATRICULE'];
		}
	}
	
	/**
	 * Renvoie le matricule(cle primaire) du visiteur qui precede
	 * le visiteur dont le matricule est passé en parametre
	 *
	 * @param String le matricule d'un visiteur
	 * @return le matricule du medicament suivant
	 * 			OU null si le matricule n'est pas dans la table ou s'il n'y a pas de precedent
	 */
	public function precedent($matricule)
	{
		$this->load->database();
		$req="SELECT * FROM visiteur";
		$res = $this->db->query($req);
		$resTab = $res->result_array();
	
		$i=1;
	
		while($i<$res->num_rows())
		{
			if($resTab[$i]['VIS_MATRICULE']==$matricule)
			{
				return $resTab[$i-1]['VIS_MATRICULE'];
			}
			$i++;
		}
		return null;
	}
	
	/**
	 * Retourne le matricule du premier visiteur de la table.
	 * 
	 * @return le matricule du premier visiteur de la table.
	 */
	public function getPremier()
	{
		$this->load->database();
		$req="SELECT * FROM visiteur";
		$res = $this->db->query($req);
		$resTab = $res->result_array();
		
		return$resTab[0]['VIS_MATRICULE'];
	}
	
	/**
	 * Retourne tous les visiteurs de la table visiteur.
	 *
	 * @return les visiteurs de la table visiteur sous forme de tableau.
	 */
	public function getTousLesVisiteurs()
	{
		$this->load->database();
		$req="SELECT * FROM visiteur";
		$res=$this->db->query($req)->result_array();
		return $res;
	}
	
}