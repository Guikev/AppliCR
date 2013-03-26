<?php
/**
 * Le model m_connexion permet de vérifier si le login et le mot de passe
 * d'un visiteur sont dans la table Visiteur.
 * 
 * @author 
 *
 */

class M_Connexion extends CI_Model
{
	
	/**
	 * Vérifie le login et le mdp du visiteurs dans la base eonnées.
	 * 
	 * @param String $login
	 * @param String $mdp
	 * 
	 * @return Le matricule du visiteur si le login et mdp sont justes
	 * 			SINON retourne -1
	 */
	public function check_infos_connexion($login,$mdp)
	{
		$this->load->database();
		
		$req='SELECT * FROM VISITEUR';
		$res = $this->db->query($req);
		foreach ($res->result_array() as $row)
		{
			if((strtolower($row['VIS_IDENTIFIANT']) == strtolower($login)) && ($row['VIS_MDP']==$mdp))
			{
				return $row['VIS_MATRICULE'];
			}
		}
		
		return -1;
		
	}
}

//FIN
//Classe 