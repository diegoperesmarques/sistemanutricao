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
      $this->form_validation->set_error_delimiters("<p class = 'alert alert-danger'>","</p>");
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
          //Variáveis de sessão
          $this->session->set_userdata('codigoUsuarioLogado',$usuarioBanco['idUsuarioSistema']);
          $this->session->set_userdata('loginUsuarioLogado', $usuarioBanco['loginUsuario']);
          $this->session->set_userdata('nomeUsuarioLogado', $usuarioBanco['nomeCompleto']);
          $this->session->set_userdata('nivelUsuarioLogado', $usuarioBanco['nivelAcesso']);
          

          //Insert na tabela de auditoria de acesso
          $dadosAuditoria = array(
            'idUsuarioSistema' => $usuarioBanco['idUsuarioSistema'],
            'tipoAcesso' => 'CONEXAO'
          );
          $this->DadosUsuario_model->insertAuditoriaAcesso($dadosAuditoria);
          redirect("listaPaciente");
        } else {
          echo "Não validado";
        }


      }
      //Fim validação formulário

    }

    public function deslogar(){
      $dadosAuditoria = array(
        'idUsuarioSistema' => $this->session->userdata('codigoUsuarioLogado'),
        'tipoAcesso' => 'DESCONEXAO'
      );
      $this->DadosUsuario_model->insertAuditoriaAcesso($dadosAuditoria);
      $this->session->unset_userdata('codigoUsuarioLogado');
      $this->session->unset_userdata('loginUsuarioLogado');
      $this->session->unset_userdata('nomeUsuarioLogado');
      $this->session->unset_userdata('nivelUsuarioLogado');
      redirect("/");
    }
  }
?>