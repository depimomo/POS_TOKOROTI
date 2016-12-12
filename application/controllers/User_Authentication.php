<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Authentication extends CI_Controller {

	public function __construct() {
            parent::__construct();
            // load model
            $this ->load->model('Login_Database');

         }
	public function index()
	{
		$this->load->view('login/index.php');
		/*$session = $this -> session ->userdata(isLogin);
		if ($session == FALSE) {
			
		}
		else
		{
			redirect('admin/admin_account.php')
		}*/
	}

	public function user_login_process(){
		/*$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('');
		}
		else
		{
		$this->load->view('login_form');
		}
		} else {
		$data = array(
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password')
		);
		$result = $this->login_database->login($data);
		if ($result == TRUE) {

		$username = $this->input->post('username');
		$result = $this->login_database->read_user_information($username);
		if ($result != false) {
		$session_data = array(
		'username' => $result[0]->user_name,
		'email' => $result[0]->user_email,
		);*/
	}
}
