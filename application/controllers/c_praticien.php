<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_praticien extends CI_Controller {
	
	/**
	 * Sert à afficher la page d'acceuil des praticiens
	 */
	function index(){
		$session_id = $this->session->userdata('idConnecte');
		if($session_id != FALSE)
		{
			$session_id = $this->session->userdata('idConnecte');
			$this->load->model('m_praticien');
			$data['praticien'] = $this->m_praticien->get_praticien();
			$this->load->view('menuCR', array('id'=>$session_id));
			$this->load->view('v_praticien', $data);
			$this->load->view('_pied.php');
		}
	}
	
	/**
	 * Permet d'afficher les informations du praticen séléctionné par l'utilisateur dans le select "lstPrat"
	 * grâce au bouton "chercher" du formulaire "formListeRecherche"
	 */
	function choix(){
		
		$session_id = $this->session->userdata('idConnecte');
		if($session_id != FALSE)
		{
			$session_id = $this->session->userdata('idConnecte');
			$this->load->model('m_praticien');
			$id = $_REQUEST['lstPrat'];
	
			
			$data['praticien'] = $this->m_praticien->get_praticien();
			foreach ($data['praticien'] as $p){
				if($id == $p->PRA_NUM){
					$data['selection']=$p;
				}
			}
			$data['suivant'] = $this->m_praticien->suivant($id);
			$data['precedent'] = $this->m_praticien->precedent($id);
			$this->load->view('menuCR', array('id'=>$session_id));
			$this->load->view('v_praticien', $data);
			$this->load->view('_pied.php');
		}
	}
	
	/**
	 * Permet de parcourir la liste des praticiens un à un et d'afficher à chaque fois les informations
	 * grâce aux boutons "précedent" et "suivant" du formulaire "précedent" et "suivant"
	 */
	function parcourir(){
		
		$session_id = $this->session->userdata('idConnecte');
		if($session_id != FALSE)
		{
			$session_id = $this->session->userdata('idConnecte');
			$this->load->model('m_praticien');
			
			if (isset($_POST['precedent'])){
				$id = $_REQUEST['precedent'];
			}
			elseif (isset($_POST['suivant'])){
				$id = $_REQUEST['suivant'];
			}
			
			$data['praticien'] = $this->m_praticien->get_praticien();
			
			foreach ($data['praticien'] as $p){
				if($id == $p->PRA_NUM){
					$data['selection']=$p;
				}
			}
			$data['suivant'] = $this->m_praticien->suivant($id);
			$data['precedent'] = $this->m_praticien->precedent($id);
			$this->load->view('menuCR', array('id'=>$session_id));
			$this->load->view('v_praticien', $data);
			$this->load->view('_pied.php');
		}
	}
}