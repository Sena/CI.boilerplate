<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class MY_Model
 */
class MY_Model extends CI_Model {

    /**
     * @var null
     */
    protected $table = NULL;
    /**
     * @var null
     */
    protected $alias = NULL;

    /**
     *
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * @return string
     */
    protected function getTable()
    {
        if($this->table === NULL) {
            $this->table = get_called_class();
            $this->table = explode('_', $this->table);
            $this->table = current($this->table);
            $this->table = strtolower($this->table);
        }
        return $this->table;
    }

    /**
     * @return string
     */
    protected function getAlias()
    {
        if($this->alias === NULL) {
            $table = $this->getTable();
            $this->alias = substr($table, 0, 1);
        }
        return $this->alias;
    }

    /**
     * @param array $where
     * @param null $limit
     * @return mixed
     */
    public function get(array $where = array(), $limit = null)
    {
        if(count($where) !== 0) {
            foreach ($where as $key => $value) {
                if(is_array($value)) {
                    $this->db->where_in($this->getAlias() . '.' . $key, $value);
                }else{
                    $this->db->where($this->getAlias() . '.' . $key, $value);
                }
            }
        }
        if($limit !== null) {
            $this->db->limit($limit);
        }
        return $this->db->get($this->getTable() . ' AS ' . $this->getAlias());
    }

    /**
     * @param array $data
     * @param bool $insert_id
     * @return CI_DB_mysql_driver
     */
    public function insert(array $data, $insert_id = FALSE) {
        $this->db->insert($this->getTable(), $data);
        if($insert_id === TRUE) {
            return (int)$this->db->insert_id();
        }
    }

    /**
     * @param array $where
     * @param array $data
     */
    public function update(array $where, array $data) {
        if(count($where) !== 0) {
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $this->db->update($this->getTable(), $data);
    }

    /**
     * @param array $where
     * @return bool
     */
    public function delete(array $where) {
        $this->db->delete($this->getTable(), $where);
        $data = $this->get($where)->result();
        return count($data) === 0;
    }
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */