<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert(array $data, $insert_id = FALSE)
    {
        if(isset($data['datetime']) === false){
            $this->db->set('datetime', 'NOW()', FALSE);
        }
        return parent::insert($data, $insert_id);
    }
}