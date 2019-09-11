<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DadosUsuario_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function getDadosUsuario($usuario, $senha){
        $this->db->where('loginUsuario', $usuario);
        $this->db->where('senhaUsuario', $senha);
        $usuarioRetornado = $this->db->get("tblUsuarioSistema")->row_array();
        return $usuarioRetornado;
    }
}
?>