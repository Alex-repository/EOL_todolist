<?php

class mlist extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
  
    function saveTask($data)
    { 
        $description = array(
            'descripcion'=>$data['tarea']
        );

        $this->db->insert('tareas',$description
        );
        
    }
    function getTask(){
        $this->db->select('*');
        $this->db->from('tareas');
      
        $resultado = $this->db->get();
        return $resultado->result();
    }

    function deleteTask($data){
        $id = array(
            'id'=>$data['id'],
        );
        $sql = "UPDATE tareas SET deleted = 1 WHERE id = ?";
        $this->db->query($sql, array($id));
    }
}
