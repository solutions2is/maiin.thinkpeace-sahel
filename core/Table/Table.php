<?php
namespace Core\Table;

use Core\Database\Database;

class Table
{

    protected $table;
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }

    public function all(){
        return $this->query('SELECT * FROM ' . $this->table);
    }

    public function find($id){
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    public function find_data($id){
        return $this->query("SELECT * FROM {$this->table} WHERE user_id = ?", [$id], true);
    }

    public function allOrderedCountry(){
        return $this->query('SELECT * FROM ' . $this->table. ' Order by country_name');
    }
    
    public function allOrderedRegion(){
        return $this->query('SELECT * FROM ' . $this->table. ' Order by region_name');
    }
    public function allOrderedCircle(){
        return $this->query('SELECT * FROM ' . $this->table. ' Order by circle_name');
    }
    public function allOrderedTown(){
        return $this->query('SELECT * FROM ' . $this->table. ' Order by town_name');
    }


    public function update($id, $fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
    }

    public function update_patient($id, $fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE patient_id = ?", $attributes, true);
    }

    public function delete($id){
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
    }

    public function create($fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(', ', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
    }

    public function extract($key, $value){
        $records = $this->all();
        $return = [];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    public function extractCountry($key, $value){
        $records = $this->allOrderedCountry();
        $return = [];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    public function extractRegion($key, $value){
        $records = $this->allOrderedRegion();
        $return = [];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    public function extractCircle($key, $value){
        $records = $this->allOrderedCircle();
        $return = [];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    public function extractTown($key, $value){
        $records = $this->allOrderedTown();
        $return = [];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    public function query($statement, $attributes = null, $one = false){
        if($attributes){
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }
    
    public function lastInsertId(){
        return $this->db->lastInsertId();
    }

}