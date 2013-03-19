<?php


class c_Connexion extends CI_Controller
{

	/**
	 * Appel la vue vAuthenfication et v�rifie les donn�es saisies pour lors
	 * de l'authenfication d'un visiteur (login et mdp saisis, et visiteur pr�sent dans la base)
	 *
	 */
	public function index()
	{
		$this->load->model('m_connexion');
		
		
		$this->load->view('menu.php');
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
				initSession();
				affecterInfosConnecte($id, $login);
			}
			else
			{
				$data['erreur']='Mauvais login/mot de passe.';
			}
		}
				
		$this->load->view('v_Authentification.php',$data);	
		$this->load->view('v_pied.php');
	}
	
	public function deconnexion()
	{
		deconnecterVisiteur();
		$this->index();
	}
}


//FIN
//Classe Connexion