<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Admin extends Eloquent
{
    protected $primaryKey = 'idAdm';
    public $timestamps = false;
}