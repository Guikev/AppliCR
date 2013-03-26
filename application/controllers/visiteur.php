<?php


class Visiteur extends CI_Controller
{
	/**
	 * Appel la vue v_visiteur qui affiche les infos d'un visiteur. Par défaut (à l'appel
	 * de la page) c'est le premier visiteur de la base qui est affiché.
	 */
	public function index()
	{
		$session_id = $this->session->userdata('idConnecte');
		if($session_id != FALSE)
		{
			$this->load->model('m_visiteur');
			
			$this->load->view('_entete');
			
			$session_id = $this->session->userdata('idConnecte');
			$this->load->view('menuCR.php',array('id'=>$session_id));
			
			if(isset($_POST['suivant']))
			{
				$matricule = $this->input->post('hid_suivant');
			}
			elseif(isset($_POST['precedent']))
			{
				$matricule = $this->input->post('hid_precedent');
			}
			elseif(isset($_POST['chercher']))
			{
				$matricule = $this->input->post('lstVisiteur');
			}
			else
			{
				$matricule = $this->m_visiteur->getPremier();
			}
			
			$data['lstVis']=$this->m_visiteur->getTousLesVisiteurs();
			
			$data['leVisiteur']=$this->m_visiteur->getVisiteur($matricule);
			$data['suivant']=$this->m_visiteur->suivant($matricule);
			$data['precedent']=$this->m_visiteur->precedent($matricule);
			
			
			$this->load->view('v_visiteur',$data);
			$this->load->view('_pied');
		}
		
		else
		{
			redirect('connexion');
		}

		
	}
	
}


//FIN
//classe Connexion