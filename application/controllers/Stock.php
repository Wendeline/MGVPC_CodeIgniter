<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        if ($this->session->adm != TRUE) {
            redirect('/Login');
        }
    }
    
    public function index()
    {
        
    }
        
    public function EntreeDeStock()
    {
        $this->load->view('common/header.php');
        $this->load->view('common/nav');
        
        $this->load->view('EntreeStock_form');
        
        $this->load->view('common/footer');
    }
    
    public function SortieDeStock()
    {
        $this->load->view('common/header.php');
        $this->load->view('common/nav');
        
        $this->load->view('SortieStock_form');
        
        $this->load->view('common/footer');
    }
    
    public function AccesStat()
    {
        $this->load->view('common/header.php');
        $this->load->view('common/nav');
        
        $this->load->view('StatStock');
        
        $this->load->view('common/footer');
    }
    
    public function UpdatePosStock(){        
        $obj = Produit::find($this->input->post('ref'));
        $qte = $obj->stockProd;
        $nb = $this->input->post('nb');
        $ref = $this->input->post('ref');
        $qte = $qte + $nb;
        Produit::where('idProd',$ref)
                ->update(['stockProd'=>$qte]);
        redirect('Home');
    }
    
}