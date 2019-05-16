<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competition extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Competition_Model');
	}

	public function index()
	{
		$this->session->set_userdata('joinCompetitionSession', $joinCompetition);

		$headerData['title'] = 'Competition';
		$competitionDetail['competitionData'] = $this->Competition_Model->viewAllCompetition();

		$this->load->view('shared/master_header', $headerData);
		$this->load->view('competition/competition', $competitionDetail);
		$this->load->view('shared/master_footer');
	}

	public function searchHelper()
	{
		$this->session->set_userdata('joinCompetitionSession', $joinCompetition);

		$name = $this->input->post('txtSearch');
		redirect('competition/search/'.$name);
	}

	public function search()
	{
		$headerData['title'] = 'Competition';
		$name = $this->uri->segment(3);
		$competitionDetail['competitionData'] = $this->Competition_Model->viewCompetitionByName($name);

		$this->load->view('shared/master_header', $headerData);
		$this->load->view('competition/competition', $competitionDetail);
		$this->load->view('shared/master_footer');
	}

	public function detail()
	{
		$this->session->unset_userdata('joinCompetitionSession');

		$id = $this->uri->segment(3);
		$competitionDetail['competitionData'] = $this->Competition_Model->viewCompetitionByID($id);

		$competitionName = 'Competition Detail';
		$headerData['title'] = $competitionName;

		$this->load->view('shared/master_header', $headerData);
		$this->load->view('competition/competitionDetail', $competitionDetail);
		$this->load->view('shared/master_footer');
	}

	public function joinHelper()
	{
		if (!$this->session->userdata('activeContestantSession')) {
			redirect('auth/contestantAuth');
		}
		$this->session->unset_userdata('joinCompetitionSession');

		$this->load->helper('string');
		$token = random_string('alnum', 21);

		$joinCompetition = [
			'competitionID' => $this->uri->segment(3),
			'token' => $token
		];
		$this->session->set_userdata('joinCompetitionSession', $joinCompetition);

		redirect('competition/join/'.$token);
	}

	public function join()
	{
		if (!$this->session->userdata('joinCompetitionSession')) {
			redirect();
		}

		$token = $this->uri->segment(3);
		$competitionID = $this->session->userdata['joinCompetitionSession']['competitionID'];

		if (!$token || $token != $this->session->userdata['joinCompetitionSession']['token']) {
			redirect('competition/detail/'.$this->session->userdata['joinCompetitionSession']['competitionID']);
		}
		
		$contestantID = $this->session->userdata['activeContestantSession']['contestantID'];
		$this->load->model('Contestant_Model');

		$headerData['title'] = 'Join Competition';
		$joinDetail['competitionData'] = $this->Competition_Model->viewCompetitionByID($competitionID);
		$joinDetail['contestantData'] = $this->Contestant_Model->viewContestantByID($contestantID);

		$this->load->view('shared/master_header', $headerData);
		$this->load->view('competition/competitionRegistration', $joinDetail);
		$this->load->view('shared/master_footer');
	}
}
