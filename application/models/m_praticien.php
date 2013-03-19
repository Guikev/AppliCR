<?php
	/**
	 * Modèle pour accèder à la table praticien de la base de donnée
	 * @author Marie
	 *
	 */
class  M_praticien extends CI_Model{

	/**
 	* Renvoie la liste des praticiens de la base de donnée
 	* @return liste de tous les praticiens 
 	*/
	function get_praticien(){
		$sql = "SELECT * FROM praticien";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
 		/**
         * Renvoie l'id (cle primaire) du praticien qui suit
         * le praticien dont l'id est passé en parametre 
         * 
         * @param String l'id d'un praticien
         * @return le praticien suivant
         *                      OU null si le praticien n'est pas dans la table ou s'il n'y a pas de suivant
         */
        public function suivant($id)
        {       
                $this->load->database();
                $req="SELECT * FROM praticien";
                
                $res = $this->db->query($req);
                $resTab = $res->result_array();
                
                $i=0;
                $trouve=false;
                while($i<$res->num_rows() && !$trouve)
                {
                        $trouve = $resTab[$i]['PRA_NUM']==$id;
                        $i++;
                }
                if($i==$res->num_rows() || !$trouve)
                {
                        return null;
                }
                else
                {
                        return $resTab[$i]['PRA_NUM'];
                }
        }
        
 		/**
         * Renvoie l'id (cle primaire) du praticien qui précède
         * le praticien dont l'id est passé en parametre 
         * 
         * @param String l'id d'un praticien
         * @return le praticien précédent
         *                      OU null si le praticien n'est pas dans la table ou s'il n'y a pas de suivant
         */
        public function precedent($id)
        {
                $this->load->database();
                $req="SELECT * FROM praticien";
                $res = $this->db->query($req);
                $resTab = $res->result_array();
        
                $i=1;

                while($i<$res->num_rows())
                {
                        if($resTab[$i]['PRA_NUM']==$id)
                        {
                                return $resTab[$i-1]['PRA_NUM'];
                        }
                        $i++;
                }
                return null;
        }
        

	
}