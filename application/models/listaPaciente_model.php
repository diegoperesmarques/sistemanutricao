<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListaPaciente_model extends CI_Model {
    public function getListaPaciente (){
        $query = "call prcListaPacienteInternado;";
        $recebeListaPaciente = $this->db->query($query)->result();
        return $recebeListaPaciente;
    }
}
?>