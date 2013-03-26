<?php

class Connexion extends CI_Controller
{

	/**
	 * Appel la vue vAuthenfication et vérifie les données saisies pour lors
	 * de l'authenfication d'un visiteur (login et mdp saisis, et visiteur présent dans la base)
	 *
	 */
	public function index()
	{		
		$this->load->model('m_connexion');
		
		

		$this->form_validation->set_rules('identifiant', 'identifiant', 'required');
		$this->form_validation->set_rules('password', 'mot de passe', 'required');
		
		$this->form_validation->set_message('required','Veuillez saisir votre %s.');
		
		$data['erreur']="";
		if($this->form_validation->run())
		{			
			$login=$this->input->post('identifiant');
			$mdp=$this->input->post('password');
			$id=$this->m_connexion->check_infos_connexion($login,$mdp);
			if($id!=-1)
			{
				$this->session->set_userdata('idConnecte', $id);
			}
			else
			{
				$data['erreur']='Mauvais login/mot de passe.';
			}
		}
		
		$session_id = $this->session->userdata('idConnecte');
		$this->load->view('_entete.php');
		$this->load->view('menuCR.php',array('id'=>$session_id));
		
		$this->load->view('vAuthentification.php',$data);	
		$this->load->view('_pied.php');
	}
	
	public function deconnexion()
	{
		$this->session->sess_destroy();
		$this->index();
	}
}


//FIN
//Classe Connexion