<?php
/**
 * 
 * Modele permettant de récupérer les informations 
 * de la table médicament
 * 
 * @author 
 *
 */

class M_Medicaments extends CI_Model
{
	/**
	 * Renvoie le depot legal(cle primaire) du medicament qui suit
	 * le médicament dont le depot legal est passé en parametre 
	 * 
	 * @param String le depotLegal d'un medicament
	 * @return le depot legal du medicament suivant
	 * 			OU null si le depot legal n'est pas dans la table ou s'il n'y a pas de suivant
	 */
	public function suivant($depotL)
	{	
		$this->load->database();
		$req="SELECT * FROM medicament";
		
		$res = $this->db->query($req);
		$resTab = $res->result_array();
		
		$i=0;
		$trouve=false;
		while($i<$res->num_rows() && !$trouve)
		{
			$trouve = $resTab[$i]['MED_DEPOTLEGAL']==$depotL;
			$i++;
		}
		if($i==$res->num_rows() || !$trouve)
		{
			return null;
		}
		else
		{
			return $resTab[$i]['MED_DEPOTLEGAL'];
		}
	}
	
	
	/**
	* Renvoie le depot legal(cle primaire) du medicament qui précède
	* le médicament dont
	*
	* @param String le depotLegal d'un medicament
	* @return le depot legal du medicament précédent
	* 			OU null si le depot legal n'est pas dans la table ou s'il n'y a pas de précédant
	*/
	public function precedent($depotL)
	{
		$this->load->database();
		$req="SELECT * FROM medicament";
		$res = $this->db->query($req);
		$resTab = $res->result_array();
	
		$i=1;

		while($i<$res->num_rows())
		{
			if($resTab[$i]['MED_DEPOTLEGAL']==$depotL)
			{
				return $resTab[$i-1]['MED_DEPOTLEGAL'];
			}
			$i++;
		}
		return null;
	}
	
	/**
	 * Renvoie les informations sous forme de tableau du medicament dont
	 * depot légal est passé en paramètre.
	 * 
	 * @param String $depotL, le depot legal du medicament
	 * @return informations du medicament sous forme de tableau
	 */
	public function getMedicament($depotL)
	{
		$this->load->database();
		return $this->db->get_where('medicament', array('MED_DEPOTLEGAL' => $depotL))->result_array();
	}
}