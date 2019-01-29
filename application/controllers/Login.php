<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {        
        $this->load->view('common/header.php');
        if ($this->session->adm == TRUE) {
            redirect('Home');
         }
         else {
            
            $data['titre'] = "Identification";
            $data['soustitre'] = "Pour accéder à ProdIgniter, merci de saisir vos identifiants";
            $this->load->view('login_form',$data);
         }
         $this->load->view('common/footer.php');
    }
        
    public function check_admin()
    {
        $nbrep = Admin::where(['mailAdm'   =>$this->input->post('mail'),
                                'mdpAdm'  =>$this->input->post('pwd'),])->count();
        
        if ($nbrep == 1){
            $sessiondata = array(
                   'nom'  => $this->input->post('mail'),
                   'adm'=> TRUE
               );
            $this->session->set_userdata($sessiondata);
            redirect('Home');
        }else {
            $this->load->view('common/header');
            
            $data['titre'] = "Identification";
            $data['soustitre'] = "Vérifiez vos identifiants d'administration et recommencez !";
            $this->load->view('login_form',$data);
            
            $this->load->view('common/footer');
        }
    }
    
    public function disconnect()
    {
        $sessiondata = array(
                   'nom'  => "",
                   'adm'=> FALSE
               );
            $this->session->set_userdata($sessiondata);
        
        $this->session->set_userdata("");
        redirect('Login');
    }
}