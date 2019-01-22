<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panier extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->client=! TRUE){
            redirect('/Login');
        }
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav');

        $panier = $this->cart->content();
        print_r($panier);

        $this->load->view('common/footer');
    }

}
