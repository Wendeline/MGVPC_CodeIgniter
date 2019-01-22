<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Produit extends Eloquent
{
    protected $primaryKey = 'idProd';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}