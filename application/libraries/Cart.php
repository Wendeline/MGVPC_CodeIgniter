<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * ATTENTION !
 * Cette bibliothèque ne marche pas si l'id du produit commence par un nombre,
 * est un nombre ou si vous utilisez la clause auto_increment.
 * En effet, la variable session créée ici ne peut pas avoir un nom qui débute
 * par un nombre.
 * POUR CORRIGER, 2 SOLUTIONS :
 *    - Changer le type de l'id dans la base de données et mettre une référence
 * OU - Ajouter une chaîne devant l'id dans les set_userdata(...) et userdate(...)
 *      ex : ...set_userdata('REF.'.$id,$new_data);
 */
class CI_Cart {
    
    private $CI;  
    
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('Products_model', 'ProdManager');
    }
    
    public function add($id)
    {			
        //Calcul de la nouvelle quantité (1 ou old+1)
        if (is_null($this->CI->session->userdata($id))) {
            //le produit $id n'est pas dans le panier
            $qty=1;
        }else {
            //je récupère les données de session du produit $id
            $sess_data=$this->CI->session->userdata($id);
            $qty=$sess_data['qty']+1;
        }
        
        //Trouver le nom et le prix du produit dans la base
        $prod=$this->CI->ProdManager->get_product($id);        
        if ($prod != FALSE) {
            $new_data = array (
                'name'=>$prod->libProd,
                'qty'=>$qty,
                'price'=>$prod->prixProd
            );
            $this->CI->session->set_userdata($id,$new_data);
        }
    }

    public function remove($id)
    {
        $prod = $this->CI->session->$id;
        if (!is_null($prod)) {
            //le produit est dans le panier
            if ($prod['qty'] > 1) {
                $prod['qty'] = $prod['qty']-1;
                $this->CI->session->set_userdata($id,$prod);
            }
            else {
                $this->CI->session->unset_userdata($id);
            }
        }
    }

    public function clear()
    {
        $this->CI->session->sess_destroy();
    }
    
    public function content()
    {
        $panier = $this->CI->session->userdata();
        array_shift($panier); //pour supprimer le premier element
        return($panier);
    }
    
    public function count()
    {
        $panier = $this->CI->session->userdata();
        array_shift($panier);
        $nb=0;
        foreach($panier as $prod) {
            $nb=$nb + $prod['qty'];
        }
        return $nb;
    }

    public function total()
    {
        $panier = $this->CI->session->userdata();
        array_shift($panier);
        $total=0;
        foreach($panier as $prod) {
            $total=$total + $prod['qty']*$prod['price'];
        }
        return $total;
    }
}