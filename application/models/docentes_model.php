<?php
defined('BASEPATH') OR exit('No direct script access allowed');             
class docentes_model extends CI_Model{
    public function __construct() {
        
        parent::__construct();

        $this->load->database();
    }
     
    public function ver(){
     
        $consulta=$this->db->query("SELECT * FROM docentes;");
         
      
        return $consulta->result();
    }
     
    public function add($email,$password,$nombre,$apellido){
        $consulta=$this->db->query("SELECT email FROM docentes WHERE email LIKE '$email'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query("INSERT INTO docentes VALUES(NULL,'$email','$password','$nombre','$apellido');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
     
    public function mod($id_docente,$modificar="NULL",$email="NULL",$password="NULL",$nombre="NULL",$apellido="NULL"){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT * FROM docentes WHERE id_docente=$id_docente");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE docentes SET email='$email', password='$password',
              nombre='$nombre', apellido='$apellido' WHERE id_docente=$id_docente;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
    }
     
    public function eliminar($id_docente){
       $consulta=$this->db->query("DELETE FROM docentes WHERE id_docente=$id_docente");
       if($consulta==true){
           return true;
       }else{
           return false;
       }
    }
 
 
}
?>
