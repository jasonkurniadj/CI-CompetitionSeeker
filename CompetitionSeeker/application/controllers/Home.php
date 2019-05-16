<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Competition_Model');
	}

	public function index()
	{
		$headerData['title'] = 'Home';
		$allCompetition['competitionData'] = $this->Competition_Model->viewAllCompetition();

		$this->load->view('shared/master_header', $headerData);
		$this->load->view('index', $allCompetition);
		$this->load->view('shared/master_footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		// $this->session->set_flashdata('logoutSuccessSession', '<div class="alert alert-success" role="alert">You have been logout..</div>');

		redirect();
	}

	public function about()
	{
		$headerData['title'] = 'About';

		$this->load->view('shared/master_header', $headerData);
		$this->load->view('others/about');
		$this->load->view('shared/master_footer');
	}

	public function comingSoon()
	{
		$this->load->view('comingSoon');
	}
}
