<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  class ListaPaciente extends CI_Controller {
    function __construct(){
      parent::__construct();
      $this->load->model('ListaPaciente_model');
    }

    public function index(){
      $recebeLista = $this->ListaPaciente_model->getListaPaciente();
      $dados = array("listaPaciente" => $recebeLista);
        $this->load->view('listaPaciente', $dados);
    }
  }
?>