<?php

defined('BASEPATH') OR exit('No direct script access allowed');   

class docentes_controller extends CI_Controller{
    
    public function __construct() {
      
        parent::__construct();
         
      
        $this->load->helper("url"); 
         
      
        $this->load->model("docentes_model");
         
       
        $this->load->library("session");
    }
      
    public function index(){
         
        $docentes["ver"]=$this->docentes_model->ver();
         
        //cargo la vista y le paso los datos
        $this->load->view("docentes_view",$docentes);
    }
    
    public function add(){
              
        if($this->input->post("submit")){
         
        $add=$this->docentes_model->add(
                $this->input->post("email"),
                $this->input->post("password"),
                $this->input->post("nombre"),
                $this->input->post("apellido")
                );
        }
        if($add==true){
            
            $this->session->set_flashdata('correcto', 'Usuario añadido correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Usuario no añadido correctamente');
        }
        
        redirect(base_url("index.php/docentes_controller"));
    }
     
    public function mod($id_docente){
        if(is_numeric($id_docente)){
          $datos["mod"]=$this->docentes_model->mod($id_docente);
          $this->load->view("modificar_view",$datos);
          if($this->input->post("submit")){
                $mod=$this->docentes_model->mod(
                        $id_docente,
                        $this->input->post("submit"),
                        $this->input->post("email"),
                        $this->input->post("password"),
                        $this->input->post("nombre"),
                        $this->input->post("apellido")
                        );
                if($mod==true){
                    
                    $this->session->set_flashdata('correcto', 'Usuario modificado correctamente');
                }else{
                    $this->session->set_flashdata('incorrecto', 'Usuario modificado correctamente');
                }
                redirect(base_url("index.php/docentes_controller"));
            }
        }else{
            redirect(base_url("index.php/docentes_controller"));
        }
    }
     
    //Controlador para eliminar
    public function eliminar($id_docente){
        if(is_numeric($id_docente)){
          $eliminar=$this->docentes_model->eliminar($id_docente);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Usuario eliminado correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Usuario eliminado correctamente');
          }
          redirect(base_url("index.php/docentes_controller"));
        }else{
          redirect(base_url("index.php/docentes_controller"));
        }
    }
}
?>
