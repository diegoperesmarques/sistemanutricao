<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  class ListaPaciente extends CI_Controller {
    public function index(){
        $this->load->view('listaPaciente');
    }
  }
?>