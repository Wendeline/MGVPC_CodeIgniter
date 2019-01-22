<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_model extends CI_Model
{    
    protected $table = 'produits';

    public function add_product($idP,$emp, $libP, $desc, $prixP,$stock)
    {
            $this->db->set('idProd',$idP);
            $this->db->set('emplacement' , $emp);
            $this->db->set('libProd',$libP);
            $this->db->set('descProd',$desc);
            $this->db->set('prixProd',$prixP);
            $this->db->set('stockProd',$stock);

            $this->db->insert($this->table);
    }

    public function edit_product($idP,$emp=null, $libP=null, $desc=null, $prixP=null, $stock=null)
    {
        if($libP != null){
            // si le 2d paramètre n'est pas null j'associe la valeur au champ
            $this->db->set('libProd', $libP);
        }
        if($emp != null){
            $this->db->set('emplacement', $emp);
        }
        if($prixP != null){
            $this->db->set('prixProd', $prixP);
        }
        if($desc != null){
            $this->db->set('descProd', $desc);
        }
        if($stock != null){
            $this->db->set('stockProd', $stock);
        }
        $this->db->where('idProd', $idP);
        $this->db->update($this->table);
    }

    public function remove_product($idP)
    {
        $this->db->where('idProd',$idP);
        $this->db->delete($this->table);
    }

    public function count($where = array())
    {
        $this->db->where($where);
        return $this->db->count_all_results($this->table);
    }

    public function get_catalogue()
    {
        return $this->db->select('*')
                        ->from($this->table)
                        ->order_by('prixProd', 'asc')
                        ->get()
                        ->result();
    }
    
    public function get_product($ref_prod)
    {
        $res = $this->db->select('*')
                        ->from($this->table)
                        ->where('idProd', $ref_prod)
                        ->get()
                        ->result();
        if (isset($res[0])) {
            return $res[0];
        }
        else {
            return FALSE;
        }

    }
}
    