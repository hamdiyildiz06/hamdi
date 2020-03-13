<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{

    public $tableName = "";

  public function __construct()
  {
    parent::__construct();
    $this->tableName = "products";
  }

  public function get_all()
  {
      return $this->db->get($this->tableName)->result();
  }

  public function add($data = array())
  {
      return $this->db->insert($this->tableName, $data);
  }

}