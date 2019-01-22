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
        if ($this->session->admin == TRUE || $this->session->client == TRUE) {
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
        $nbrep = Client::where([
                        'mailCli'   =>$this->input->post('mail'),
                        'mdpCli'  =>$this->input->post('pwd'),
                    ])->count();
        
        $nbrep2 = Admin::where(['mailAdm'   =>$this->input->post('mail'),
                                'mdpAdm'  =>$this->input->post('pwd'),])->count();
        
        if ($nbrep==1) {
            //$client = Client::where(['mailCli' =>$this->input->post('mail')])->get();
            //enregistrement des données de session
            $sessiondata = array(
                   'nom'  => $this->input->post('mail'),
                   //'id'  =>$client->idCli,
                   'client'=> TRUE,
                   'admin'=>FALSE
               );
            
            $this->session->set_userdata($sessiondata);
            var_dump($sessiondata);
            redirect('Home');
        }else if ($nbrep2 == 1){
            $sessiondata = array(
                   'nom'  => $this->input->post('mail'),
                   'admin'=> TRUE,
                   'client'=> FALSE
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
                   'admin'=> FALSE,
                   'client'=>FALSE
               );
            $this->session->set_userdata($sessiondata);
        
        $this->session->set_userdata("");
        redirect('Login');
    }
}