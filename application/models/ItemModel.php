<?php

class ItemModel  extends CI_Model
{
    
    protected $table = 'items';

    function __construct ()
    {
        $this->load->database();
    }

    public function getItems()
    {
        //- if slug pased in
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function setItem($arr)
    {
        $this->db->insert($this->table, $arr);
        return $this->db->insert_id();
    }

    public function updateItem($id, $data)      
    {
        $this->db->set($data);
        $this->db->where('id',$id);
        $update = $this->db->update($this->table);
        if($update)
            return true;
        else
            return false;
        
    }
    
    public function deleteItem($id)      
    {
        $this->db->where('id',$id);
        $delete = $this->db->delete($this->table);
        if($delete)
            return true;
        else
            return false;
        
    }
}