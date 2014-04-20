<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/database SQL_Builder
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 **/

class SqlCommands extends Mysql {

    public function select($table, $field = '', $where = '', $order = '') {
        $params = array();
        $param[0] = '*';

        if($field != null) {
            $param[0] = $field;
        }

        if($where != '') {
            $params[1] = ' WHERE '. $where;
        }

        if($order != '') {
            $params[2] = ' ORDER BY '. $order;
        }

        return $this->execute('SELECT '. $param[0] .' FROM '. $table . $params[1] . $params[2]);
    }

    public function insert($table, $data) {
        if($data != null) {
            $column = '';
            $values = '';

            foreach($data as $key=>$val) {
                $column[] = $key;
                $values[] = '\''.$val.'\'';
            }

            $column = implode(',', $column);
            $values = implode(',', $values);

            return $this->execute('INSERT INTO '. $table .'('.$column.') VALUES ('.$values.')');
        }
    }

    public function update($table, $data, $whereClause) {
        if($data != null) {
            foreach($data as $key=>$val)
            {
                $sets[] = $key.'=\''.$val.'\'';
            }

            $sets = implode(',', $sets);

            return $this->execute('UPDATE '. $table .' SET '. $sets .' WHERE '. $whereClause);
        }
    }

    public function delete($table, $whereClause) {
        return $this->execute('DELETE FROM '. $table .' WHERE '. $whereClause);
    }

    public function fetch($query) {
        return parent::fetch_array($query);
    }

    public function getCount($query) {
        return parent::num_rows($query);
    }

    public function execute($param) {
        return parent::query($param);
    }
    
}