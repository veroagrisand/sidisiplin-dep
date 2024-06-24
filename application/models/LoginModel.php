<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    private $perintah;
    private $query;
    private $result;

    public function __construct(){
        parent::__construct();
    }

    public function admin_session($username,$password){
      $this->perintah = "SELECT * FROM super_users WHERE username = ? AND password = ?";
      $this->query = $this->db->query($this->perintah,[$username,$password]);
      $this->result = $this->query->row_array();
      return $this->result;
    }
}
