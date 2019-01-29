<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prod extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if ($this->session->adm != TRUE) {
            redirect('/Login');
        }
    }
    

    public function AjoutProd($ref = null)
    {
        if ($ref == null ){
            redirect('/Home');
        }
        
        if (Produit::find($ref)) {
            //squelette
            redirect(base_url('Home'));
        }
        else {
            redirect(base_url('Home?err'));
        }
    }

}
