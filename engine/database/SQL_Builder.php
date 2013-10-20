<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/database SQL_Builder
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 **/

class SQL_Builder extends MySQL_Base {
    
    private $and;
    private $count;    
    private $custom;
    private $delete;  
    private $from;    
    private $insert;    
    private $join;    
    private $limit;    
    private $on;    
    private $or;
    private $order;    
    private $select;    
    private $set_insert;    
    private $set_update;
    private $sort;    
    private $proccess;   
    private $update;     
    private $values;    
    private $where;
    
    public function __construct($proccess = null) {        
        $this->proccess = trim(strtolower($proccess));        
        if($this->proccess != null) {            
            return $this->proccess;            
        }       
    }
    
    public function select($field = '*') {        
        return $this->select = 'SELECT '.$field;        
    }
    
    public function table($table = null) {        
        if($table != null) {            
            switch($this->proccess) {
                case 'select' :                                
                    return $this->from .= ' FROM '.$table;                
                break;
                
                case 'insert' :                
                    return $this->insert = 'INSERT INTO '.$table;                
                break;
                
                case 'delete' :                
                    return $this->delete = 'DELETE FROM '.$table;                
                break;
                
                case 'update' :                
                    return $this->update = 'UPDATE '.$table;                
                break;
                
                default :
                break;            
            }        
        }        
    }
    
    public function insert($data = null) {        
        if($data != null) {
            foreach($data as $key=>$val) {                
                $column[] = $key;
                $values[] = '\''.$val.'\'';
            }
                
            $column = implode(',', $column);
            $values = implode(',', $values);
                
            return $this->set_insert = ' ('.$column.') VALUES ('.$values.') ';
        }
    }
    
    public function update($data = null) {        
        if($data != null) {            
            foreach($data as $key=>$val) 
            {
                $sets[] = $key.'=\''.$val.'\'';
            }
                  
            $sets = implode(',', $sets);
        
            return $this->set_update = ' SET '.$sets;        
        }
    }
    
    public function where($where = null) {        
        if($where != null) {        
            return $this->where = ' WHERE '.$where;        
        }                 
    }
    
    public function where_and($and = null) {        
        if($and != null) {        
            return $this->and = ' AND '.$and;        
        }                 
    }
    
    public function where_or($or = null) {        
        if($or != null) {        
            return $this->or = ' OR '.$or;        
        }                 
    }
    
    public function join($join_type = null, $table = null) {        
        if($join_type != null && $table != null) {        
            switch(trim(strtolower($join_type))) {
                case 'inner':                    
                    $this->join = ' INNER JOIN '.$table;                    
                break;
                
                case 'left':                
                    $this->join = ' LEFT JOIN '.$table;                
                break;
                
                default :                
                    //wrong values here...                
                break;
            }        
        }        
    }
    
    public function on($on = null) {        
        if($on != null) {
            return $this->on = ' ON '.$on;
        }        
    }
    
    public function count($count, $as) {        
        if($count != null && $as != null) {        
            return $this->count = ' COUNT ('.$count.') AS '.$as;        
        }    
    }
    
    public function order($order = null) {        
        if($order != null) {        
            return $this->order = ' ORDER BY '.$order;        
        }                
    }
    
    public function sort($sort = null) {        
        switch($sort) {
            case 'ASC' :            
                $this->sort = ' ASC ';            
            break;
            
            case 'DESC' :            
                $this->sort = ' DESC ';            
            break;
            
            default :            
                return null;            
            break;
        }
        
        return $this->sort;
        
    }
    
    public function limit($limit = null) {        
        if($limit != null) {            
            return $this->limit = ' LIMIT '.$limit;            
        }        
    }
    
    public function group($group = null) {        
        if($group != null) {            
            return $this->group = ' GROUP BY '.$group;        
        }        
    }
    
    public function custom($sql = null) {
        if($sql != null) {
            return $this->custom = $sql;
        }
    }
    
    public function build() {        
        switch($this->proccess) {            
            case 'select' :
                $sql  = $this->select; 
                $sql .= $this->count;
                $sql .= $this->from; 
                $sql .= $this->join; 
                $sql .= $this->on;
                $sql .= $this->where;
                $sql .= $this->and;
                $sql .= $this->or;
                $sql .= $this->order; 
                $sql .= $this->sort;
                $sql .= $this->limit;                                
            break;
            
            case 'insert' :            
                $sql  = $this->insert;
                $sql .= $this->set_insert;
                $sql .= $this->where;            
            break;           
            
            case 'update' :            
                $sql = $this->update;
                $sql .= $this->set_update;
                $sql .= $this->where;
                $sql .= $this->and;                
            break;
            
            case 'delete' :                
                $sql  = $this->delete;
                $sql .= $this->where;
                $sql .= $this->and;                
            break;
            
            case 'custom' :
                $sql = $this->custom;
            break;
            
            default :                
                return $this->error_msg('sql_type');            
            break;
        
        }
        
        return parent::query($sql);        
    }
    
    public function error_msg($error_type = null) {        
        switch($error_type) {
            case 'sql_type' :                
                echo TEXT_INVALID_SQL_TYPE;            
            break;
            
            default :
            break;
        }    
    }
    
}

?>