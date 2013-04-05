<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_Rapport_visite extends CI_Controller {

	/**
	 * Affiche la vue v_rapport_visite celon le choix de l'utilisateur.
	 */
	public function index()
	{
		$session_id = $this->session->userdata('idConnecte');
		if($session_id != FALSE)
		{
			$session_id = $this->session->userdata('idConnecte');
			$this->load->model('m_praticien');
			$this->load->model('m_medicaments');
			$this->load->model('m_rapport_visite');
			$data['praticien'] = $this->m_praticien->get_praticien();
			$data['medicament'] = $this->m_medicaments->get_medicament();
			
			$this->load->view('_entete.php');
			$this->load->view('menuCR',array('id'=>$session_id));
			$this->load->view('v_rapport_visite', $data);
			$this->load->view('_pied.php');
		}
	}
	
	public function ajouterCR()
	{
		$session_id = $this->session->userdata('idConnecte');
		if($session_id != FALSE)
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('RAP_NUM', 'Numero de rapport', 'required|is_unique[rapport_visite.RAP_NUM]');
			$this->form_validation->set_rules('RAP_DATEVISITE', 'Date de la visite', 'required');
			$this->form_validation->set_rules('RAP_BILAN', 'Bilan', 'required');
			$this->form_validation->set_rules('PRA_COEFF', 'Coefficient', 'required|double');
			$this->form_validation->set_rules('lstPrat', 'lstPrat', 'required');
			$this->form_validation->set_rules('PROD1', 'PROD1', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			else
			{
				$data['set'] = $this->m_rapport_visite->set_rapportVisite();
				$this->accueil();
			}
		}
	}
	
	
	public function accueil()
	{
		$session_id = $this->session->userdata('idConnecte');
		if($session_id != FALSE)
		{
			$this->load->view('_entete.php');
			$this->load->view('menuCR.php',array('id'=>$session_id));
				
			$this->load->view('v_accueil');
			$this->load->view('_pied.php');
		}
	}

}

/* End of file c_medicament.php */
/* Location: ./application/controllers/c_medicament.php */