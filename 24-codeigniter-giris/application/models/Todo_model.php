<?php

class Todo_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public $tableName = "todos";
	
	

    public function hepsiniGetir(){

        return $this->db->query("SELECT * FROM $this->tableName ORDER BY createdAt ASC")->result();

    }
	
	

    public function ekle($data = array()){

        return $this->db->insert($this->tableName,$data);

    }
	
	

    public function sil($id){

        return $this->db->query("DELETE FROM $this->tableName WHERE id=$id");

    }
	
	

    public function guncelle($id ,$completedDurumu){

        return $this->db->query("UPDATE $this->tableName SET isCompleted=$completedDurumu WHERE id=$id");

    }
}