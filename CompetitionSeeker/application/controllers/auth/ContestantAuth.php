<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContestantAuth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if (!$this->session->userdata('activeContestantSession')) {
			$this->form_validation->set_rules('txtEmail', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('txtPassword', 'Password', 'required|trim');

			if (!$this->form_validation->run()) {
				$headerData['title'] = 'Contestant SignIn';
				$this->load->view('contestant/login', $headerData);
			}
			else {
				$this->doLogin();
			}
		}
		else {
			redirect();
		}
	}

	private function doLogin()
	{
		$email = $this->input->post('txtEmail');

		$loginUserData = $this->db->get_where('msContestant', ['email'=>$email])->row_array();
		//var_dump($loginUserData);
		//die;

		if ($loginUserData) {
			$password = $this->input->post('txtPassword');

			if ($loginUserData['contestantID'] == 1) {
				if ($password == $loginUserData['password']) {
					$activeLogin = [
						'contestantID' => $loginUserData['contestantID'],
						'contestantName' => $loginUserData['contestantName'],
						'email' => $loginUserData['email']
					];

					$this->db->set('lastLogin', date('Y-m-d H:i:s'), true);
					$this->db->where('email', $loginUserData['email']);
					$this->db->update('msContestant');
					
					$this->session->set_userdata('activeContestantSession', $activeLogin);
					redirect();
				}
				else {
					$this->session->set_flashdata('loginStatusSession', '<div class="alert alert-danger" role="alert">Invalid password!</div>');
					redirect('auth/contestantAuth');
				}
			}
			else {
				if (password_verify($password, $loginUserData['password'])) {
					$activeLogin = [
						'contestantID' => $loginUserData['contestantID'],
						'contestantName' => $loginUserData['contestantName'],
						'email' => $loginUserData['email']
					];

					$this->db->set('lastLogin', date('Y-m-d H:i:s'), true);
					$this->db->where('email', $loginUserData['email']);
					$this->db->update('msContestant');

					$this->session->set_userdata('activeContestantSession', $activeLogin);
					redirect();
				}
				else {
					$this->session->set_flashdata('loginStatusSession', '<div class="alert alert-danger" role="alert">Invalid password!</div>');
					redirect('auth/contestantAuth');
				}
			}
		}
		else {
			$this->session->set_flashdata('loginStatusSession', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('auth/contestantAuth');
		}
	}

	public function register()
	{
		if (!$this->session->userdata('activeContestantSession')) {
			$this->form_validation->set_rules('txtName', 'Full Name', 'required|trim');
			$this->form_validation->set_rules('rbGender', 'Gender', 'required');
			$this->form_validation->set_rules('calDOB', 'Date of Birth', 'required');
			$this->form_validation->set_rules('txtPhone', 'Phone Number', 'required|trim|numeric');
			$this->form_validation->set_rules('txtEmail', 'Email', 'required|trim|valid_email|is_unique[msContestant.email]', ['is_unique' => 'This email already registered!']);
			$this->form_validation->set_rules('txtPassword', 'Password', 'required|trim|min_length[6]');
			$this->form_validation->set_rules('txtRePassword', 'Retype Password', 'required|trim|matches[txtPassword]');

			if (!$this->form_validation->run()) {
				$headerData['title'] = 'Contestant Registration';
				$this->load->view('contestant/register', $headerData);
			}
			else {
				$registerData = [
					'contestantName' => $this->input->post('txtName', true),
					'contestantGender' => $this->input->post('rbGender', true),
					'contestantDOB' => $this->input->post('calDOB', true),
					'contestantPhone' => $this->input->post('txtPhone', true),
					'email' => $this->input->post('txtEmail', true),
					'password' => password_hash($this->input->post('txtPassword'), PASSWORD_DEFAULT)
				];

				$this->db->insert('msContestant', $registerData);

				$this->session->set_flashdata('registerSuccessSession', '<div class="alert alert-success" role="alert">Congratulation! Your account has been created. Please sign in..</div>');
				redirect('auth/contestantAuth');
			}
		}
		else {
			redirect();
		}
	}

	public function resetPassword()
	{
		$this->form_validation->set_rules('txtForgetPassword', 'Email', 'required|trim|valid_email|xss_clean');

		if ($this->form_validation->run()) {
			$email = $this->input->post('txtForgetPassword');
			$fromEmail = "lapakmikir@gmail.com";
        	$toEmail = $this->input->post($email);

        	$this->load->helper('string');
			$newPassword = random_string('alnum', 8);

			// Code here

			$message = "Dear CompetitionSeeker User,\n\n";
			$message = $message."Your new password: ".$newPassword."\n\n";
			$message = $message."Do not share your password! After you login with your new password, please change this password immediately!\n\n";
			$message = $message."Best regards,\nCompetition Seeker Team.";

			
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com';
			$config['smtp_port'] = '587';
			$config['smtp_user'] = $fromEmail;
			$config['smtp_pass'] = 'L@p4kM1k1r';
			$config['charset'] = 'utf-8';
			$config['smtp_timeout'] = '100';
			$config['mailtype'] = 'text'; // or html
			$config['newline'] = "\r\n";
			$config['validation'] = TRUE;
			
			$this->load->library('email', $config);
			// $this->email->initialize($config);
			$this->email->set_newline("\r\n");

			$this->email->from($fromEmail, 'CompetitionSeeker');
			$this->email->to($toEmail);
			$this->email->subject('[NO-REPLY] Reset Password');
			$this->email->message($message);

			if ($this->email->send()) {
				$this->session->set_flashdata('loginStatusSession', '<div class="alert alert-success" role="alert">Your password has been reseted. Please sign in and change your password!</div>');
			}
			else {
				$this->session->set_flashdata('loginStatusSession', '<div class="alert alert-warning" role="alert">Failed to send reset password! '.$this->email->print_debugger().'</div>');
			}
		}

		redirect('auth/contestantAuth');
	}
}
