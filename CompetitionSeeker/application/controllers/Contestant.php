<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contestant extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Contestant_Model');
	}

	public function index()
	{
		$this->checkSession();
		redirect('contestant/activity');
	}

	public function login()
	{
		redirect('auth/contestantAuth');
	}

	public function activity()
	{
		$this->checkSession();
		$headerData['title'] = 'Activity';

		$this->load->view('shared/master_header', $headerData);
		$this->load->view('contestant/activity');
		$this->load->view('shared/master_footer');
	}

	public function wishlist()
	{
		redirect('home/comingSoon');
	}

	public function account()
	{
		$this->checkSession();
		$contestantID = $this->session->userdata['activeContestantSession']['contestantID'];

		$headerData['title'] = 'Account';
		$contestantDetail['contestantData'] = $this->Contestant_Model->viewContestantByID($contestantID);

		$this->load->view('shared/master_header', $headerData);
		$this->load->view('contestant/account', $contestantDetail);
		$this->load->view('shared/master_footer');
	}

	public function updateProfilePicture()
	{
		$id = $this->session->userdata['activeContestantSession']['contestantID'];
		$img = $this->input->post('fileProfilePicture');

		$this->db->set('contestantPicture', $img, true);
		$this->db->where('contestantID', $id);
		$this->db->update('msContestant');

		redirect('contestant/account');
	}

	public function updatePersonalInfo()
	{
		$this->form_validation->set_rules('txtPhone', 'Phone Number', 'required|trim|numeric');
		$this->form_validation->set_rules('txtEmail', 'Email', 'required|trim|valid_email');

		if ($this->form_validation->run()) {
			$updateData = [
				'id' => $this->session->userdata['activeContestantSession']['contestantID'],
				'phone' => $this->input->post('txtPhone'),
				'email' => $this->input->post('txtEmail')
			];

			$this->Contestant_Model->updatePersonalInfo($updateData);

			$this->alertNotification(1);
		}
		else {
			$this->alertNotification(0);
		}

		redirect('contestant/account');
	}

	public function updateCreditCard()
	{
		$this->form_validation->set_rules('txtCreditCard', 'Credit Card Number', 'required|trim');

		if ($this->form_validation->run()) {
			$updateData = [
				'id' => $this->session->userdata['activeContestantSession']['contestantID'],
				'creditCard' => $this->input->post('txtCreditCard')
			];

			$this->Contestant_Model->updateCreditCard($updateData);

			$this->alertNotification(1);
		}
		else {
			$this->alertNotification(0);
		}

		redirect('contestant/account');
	}

	public function updatePassword()
	{
		$this->form_validation->set_rules('txtCurrentPassword', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('txtNewPassword', 'New Password', 'required|trim');
		$this->form_validation->set_rules('txtReNewPassword', 'Retype New Password', 'required|trim|matches[txtNewPassword]');

		if ($this->form_validation->run()) {
			$id = $this->session->userdata['activeContestantSession']['contestantID'];
			$userData = $this->db->get_where('msContestant', ['contestantID'=>$id])->row_array();
			$currPassword = $this->input->post('txtCurrentPassword');

			if ($id == 1) {
				if ($currPassword == $userData['password']) {
					$newPassword = $this->input->post('txtNewPassword');
					$reNewPassword = $this->input->post('txtReNewPassword');

					if ($newPassword == $reNewPassword) {
						$updateData = [
							'id' => $id,
							'newPassword' => $newPassword
						];

						$this->Contestant_Model->updatePassword($updateData);

						$this->alertNotification(1);
					}
					else {
						$this->alertNotification(0);
					}
				}
				else {
					$this->alertNotification(0);
				}
			}
			else {
				if (password_verify($currPassword, $userData['password'])) {
					$newPassword = $this->input->post('txtNewPassword');
					$reNewPassword = $this->input->post('txtReNewPassword');

					if ($newPassword == $reNewPassword) {
						$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

						$updateData = [
							'id' => $id,
							'newPassword' => $newPassword
						];

						$this->Contestant_Model->updatePassword($updateData);

						$this->alertNotification(1);
					}
					else {
						$this->alertNotification(0);
					}
				}
				else {
					$this->alertNotification(0);
				}
			}
		}
		else {
			$this->alertNotification(0);
		}

		redirect('contestant/account');
	}

	private function alertNotification($flag)
	{
		if ($flag == 1) {
			$this->session->set_flashdata('updateProfileSession', '<div class="modal fade" id="forgetPasswordContainer" tabindex="-1" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="alert alert-success m-0" role="alert">Save successfully..</div></div></div></div> <script>$("#forgetPasswordContainer").modal("show");</script>');
		}
		else if ($flag == 0) {
			$this->session->set_flashdata('updateProfileSession', '<div class="modal fade" id="forgetPasswordContainer" tabindex="-1" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="alert alert-danger m-0" role="alert">Failed to saved! Please check your input..</div></div></div></div> <script>$("#forgetPasswordContainer").modal("show");</script>');
		}
		else {
			$this->session->set_flashdata('updateProfileSession', '<div class="modal fade" id="forgetPasswordContainer" tabindex="-1" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="alert alert-warning m-0" role="alert">System error!</div></div></div></div> <script>$("#forgetPasswordContainer").modal("show");</script>');
		}
	}

	private function checkSession()
	{
		if (!$this->session->userdata('activeContestantSession')) {
			redirect('auth/contestantAuth');
		}
	}
}
