<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_Medicament extends CI_Controller {

	/**
	 * Affiche la vue v_medicament celon le choix de l'utilisateur.
	 */
	public function index()
	{
		$session_id = $this->session->userdata('idConnecte');
		if($session_id != FALSE)
		{
			$session_id = $this->session->userdata('idConnecte');
			$this->load->model('m_medicaments');
			
			/** Affiche le médicament suivant lorsque l'utilisateur clique sur
			 * le bouton suivant 's' de la page v_medicament.
			 */
			if (isset($_POST['s']))
			{
				$depotL = $this->input->post('suivant');
			}
			
			/** Affiche le médicament précedent lorsque l'utilisateur clique sur
			 * le bouton précedent 'p' de la page v_medicament.
			 */
			elseif (isset($_POST['p']))
			{
				$depotL = $this->input->post('precedent');
			}
			
			/** Affiche le premier médicament de la base de données lorsque 
			 * l'utilisateur arrive sur la page v_medicament.
			 */
				else
				{
					$depotL = $this->m_medicaments->getPremierMedicament();
				}
				
			$data['m'] = $this->m_medicaments->getMedicament($depotL);
			$data['suivant'] = $this->m_medicaments->suivant($depotL);
			$data['precedent'] = $this->m_medicaments->precedent($depotL);
			$this->load->view('menuCR',array('id'=>$session_id));
			$this->load->view('v_medicament', $data);
			$this->load->view('_pied.php');
		}
	}

}

/* End of file c_medicament.php */
/* Location: ./application/controllers/c_medicament.php */