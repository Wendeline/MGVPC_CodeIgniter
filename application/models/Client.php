<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Client extends Eloquent
{
    protected $primaryKey = 'idCli';
    public $timestamps = false;
}