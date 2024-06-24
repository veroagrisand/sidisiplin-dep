<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class AdminLogin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("LoginModel");
	}

	public function index(){
		$this->load->view("admin_login");
	}

	public function login(){
		$post = $this->input->post(null,TRUE);
		$username = htmlspecialchars($post['adminUsername']);
		$password = htmlspecialchars($post['adminPassword']);
		$user = $this->LoginModel->admin_session($username,$password);
		if ($user["id_super_user"] != null) {
			$data = ["role_admin" => $user["username"], "aplikasi" => "sidisiplin_admin"];
			$this->session->set_userdata($data);
			redirect(site_url("admin/dashboard"));
		}else {
			redirect(site_url());
		}
	}
}
