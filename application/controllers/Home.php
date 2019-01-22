<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        var_dump($this->session);
        parent::__construct();
        if ($this->session->admin != TRUE && $this->session->client=! TRUE){
            redirect('/Login');
        }
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('common/nav');

        $data['titre'] = "Liste des produits";
        $data['soustitre'] = "Tous les produits actuellement disponibles en magasin";
        $data['donnees'] = Produit::orderby('stockProd','desc')->get();
        $this->load->view('home_liste_produits',$data);

        $this->load->view('common/footer');
    }

}
