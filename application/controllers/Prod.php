<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prod extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if ($this->session->client != TRUE) {
            redirect('/Login');
        }
    }
    

    public function AjoutPanier($ref = null)
    {
        if ($ref == null ){
            redirect('/Home');
        }
        
        if (Produit::find($ref)) {
            $this->cart->add($ref);
            $panier = $this->cart->content();
            redirect(base_url('Home'));
        }
        else {
            redirect(base_url('Home?err'));
        }
    }

}
