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
    

    public function Add()
    {
        $this->load->view('common/header.php');
        $this->load->view('common/nav');

        $this->load->view('AjoutProd_form');

        $this->load->view('common/footer');
    }

    public function Update($ref = null)
    {
        if ($ref == null ) redirect('/Home');
        $this->load->view('common/header.php');
        $this->load->view('common/nav');


        $data = array('produit' => Produit::find($ref));
        $this->load->view('UpdateProd_form', $data);

        $this->load->view('common/footer');
    }

    public function Delete($ref = null)
    {
        if ($ref == null ) redirect('/Home');
        $this->load->view('common/header.php');
        $this->load->view('common/nav');

        if (Produit::find($ref)->stockProd == 0) {
            Produit::find($ref)->delete();
            redirect('/Home');
        }
        else {
            redirect('/Home');
        }

        $this->load->view('common/footer');
    }







    public function Ajout()
    {
            $addProd = new Produit();

            $addProd->idProd        = $this->input->post('ref');
            $addProd->emplacement   = $this->input->post('emp');
            $addProd->libProd       = $this->input->post('nom');
            $addProd->descProd      = $this->input->post('desc');
            $addProd->prixProd      = $this->input->post('prix');
            $addProd->stockProd      = 0;
            $addProd->save();

            redirect('Home');
    }

    public function Modif($ref = null)
    {
      if ($ref == null ) redirect('/Home');

      $produit = Produit::find($ref);
      if ($produit != null) {

          Produit::where('idProd', $ref )
                      ->update([  'emplacement'   => $this->input->post('emp'),
                                  'libProd'   => $this->input->post('nom'),
                                  'descProd'  => $this->input->post('desc'),
                                  'prixProd'  => $this->input->post('prix'),
                              ]);

          redirect('Home');
      }
      else
      {
          $this->load->view('common/header.php');
          $this->load->view('common/nav');

          echo '<h1 style="color:black;">Echec lors de la modification du produit</h1>';

          $data = array('produit' => Produit::find($ref));
          $this->load->view('UpdateProd_form', $data);

          $this->load->view('common/footer');
      }

    }

    public function Enleve($ref = null)
    {
      if ($ref == null ) redirect('/Home');
      Produit::find($ref)->delete();
      redirect('/Home');
    }

}
