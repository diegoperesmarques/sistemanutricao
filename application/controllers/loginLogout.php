<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  class loginLogout extends CI_Controller {
    function __construct(){
      parent::__construct();
      $this->load->model('DadosUsuario_model');
    }

    public function autenticar(){
      $dadosFormulario = $this->input->post();



      //Regras para validação do formulário de login
      $this->form_validation->set_rules('usuarioDigitado','Usuario','trim|required|min_length[4]');
      $this->form_validation->set_rules('senhaDigitado','Senha','trim|required|min_length[6]');

      //Validação do formulário
      if($this->form_validation->run() == FALSE) {
        if(validation_errors()){
          $this->load->view('login');
        }
      } else {
        //Validação de Login e senha
        $dadosFormulario = $this->input->post();
        $usuarioRecebido = $dadosFormulario['usuarioDigitado'];
        $senhaRecebido = md5($dadosFormulario['senhaDigitado']);
        $usuarioBanco = $this->DadosUsuario_model->getDadosUsuario($usuarioRecebido, $senhaRecebido);
        if(($usuarioRecebido == $usuarioBanco['loginUsuario']) && ($senhaRecebido == $usuarioBanco['senhaUsuario'])){
          echo "Validado com sucesso";
        } else {
          echo "Não validado";
        }


      }
      //Fim validação formulário
      
    }
  }
?>