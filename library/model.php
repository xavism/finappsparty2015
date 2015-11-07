<?php

class Model{

	protected $table = "";

    function __construct() {

    }


    protected function find($type = 'first', $params = array(), $joins = array()) {
		// Make a connection

		$mysql = mysqli_connect( MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD) or die("Error de conexión a la bbdd");
		$mysql->select_db(MYSQL_DB) or die('Error al seleccionar la bbdd');
        $mysql->set_charset("utf8");

        $values_primary = false;
        $values_join = true;
    	$query = "SELECT ";
    	if (isset($params['fields']) && count($params['fields']) != 0) {
            foreach ($params['fields'] as &$field) {
                if (is_array($field)) {
                    $val = $field[0];
                    $func = $field[1];
                    switch ($func) {
                        case "date_format":
                            $field = "DATE_FORMAT(t1.$val,'%d/%m/%Y') AS $val";
                            break;
                    }
                }
                else {
                    $field = 't1.' . $field;
                }
            }
    		$fields= implode(",", $params['fields']);
    	}
        else {
            $values_primary = true;
        }
        if (count($joins) != 0) {
            foreach ($joins as $join) {
                $i = 2;
                if (isset($join['fields']) && count($join['fields']) != 0) {
                    $values_join = false;
                    foreach ($join['fields'] as &$field) {
                        if (is_array($field)) {
                            $val = $field[0];
                            $func = $field[1];
                            switch ($func) {
                                case "date_format":
                                    $field = "DATE_FORMAT(t$i.$val,'%d/%m/%Y') AS $val";
                                    break;
                            }
                        }
                        else {
                            $field = 't$i.' . $field;
                        }
                    }
                    $fields .= implode(",", $join['fields']);
                }
                $i++;
            }
        }
    	
        if ($values_primary && $values_join) $fields = "*";
    	
    	if ($type == 'count') $query .= "COUNT($fields) ";
    	else $query .= "$fields ";

        $query .= " FROM " . $this->table ." AS t1 ";

        if (isset($params['joins'])) {
            foreach ($params['joins'] as $table => $ons) {
                $i = 2;
                $query .= " LEFT JOIN $table AS t$i ON";
                foreach($ons AS $field1 => $field2) {
                    $query .= " t1.$field1 = t$i.$field2";
                }
            }
        }

    	if (isset($params['conditions']) && count($params['conditions']) != 0) {
    		$conditions = array();
    		foreach ($params['conditions'] as $left => $right) {
    			$conditions[] = $left . $right;
    		}
    		$conditions = implode(" AND ", $conditions);
    		$query .= " WHERE $conditions ";
    	}

        if (isset($params['order']) && count($params['order']) != 0) {
            reset($params['order']);
            $first_key = key($params['order']);
            $query .= " ORDER BY t1.$first_key " . $params['order'][$first_key];
        }

    	if ($type == 'first') {
    		$query .= " LIMIT 1";
    	}
        die($query);
    	$elems = array();
    	$result = $mysql->query($query);
    	if ($result) {
    		while ($row = $result->fetch_assoc()) {
                $elems[] = $row;
    		}
    	}
    	
        if (count($elems) != 0 && ($type == 'first' || $type == 'count')) {
            $elems = $elems[0];
        }
    	$mysql->close();
    	return $elems;
    }

    protected function update($fields, $params = array()) {
        // Make a connection
        $mysql = mysqli_connect( MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD) or die("Error de conexión a la bbdd");
        $mysql->select_db(MYSQL_DB) or die('Error al seleccionar la bbdd');
        $mysql->set_charset("utf8");

        $query = "UPDATE " . $this->table;
        if (count($fields) == 0) return false;
        $changes = array();
        foreach ($fields as $column => $value) {
            $change = "`" . $column . "`";
            $change .= "='" . $mysql->real_escape_string($value) . "'"; // This value may be manipulated by the user
            $changes[] = $change;
        }
        $changes = implode(",", $changes);
        $query .= " SET $changes ";

        $conditions = array();
        foreach ($params as $left => $right) {
            $conditions[] = $left . $right;
        }
        $conditions = implode(" AND ", $conditions);
        $query .= "WHERE $conditions ";
        
        $result = $mysql->query($query);

        $mysql->close();
        return $result;
    }

    protected function insert($fields) {
        // Make a connection
        $mysql = mysqli_connect( MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD) or die("Error de conexión a la bbdd");
        $mysql->select_db(MYSQL_DB) or die('Error al seleccionar la bbdd');
        $mysql->set_charset("utf8");

        $query = "INSERT INTO " . $this->table;
        if (count($fields) == 0) return false;
        $columns = array();
        $values = array();
        foreach ($fields as $column => $value) {
            $columns[] = "`" . $column . "`";
            $values[] = "'" . $mysql->real_escape_string($value) . "'"; // This value may be manipulated by the user
        }
        $columns = implode(",", $columns);
        $values = implode(",", $values);
        $query .= " ($columns) VALUES ($values)";

        $result = $mysql->query($query);

        if ($result) {
            $result = $mysql->insert_id;
        }

        $mysql->close();
        return $result;
    }

    protected function delete($params) {
        // Make a connection
        $mysql = mysqli_connect( MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD) or die("Error de conexión a la bbdd");
        $mysql->select_db(MYSQL_DB) or die('Error al seleccionar la bbdd');
        $mysql->set_charset("utf8");

        $query = "DELETE FROM " . $this->table;
        if (count($params) == 0) return false;

        $conditions = array();
        foreach ($params as $left => $right) {
            $conditions[] = $left . $right;
        }
        $conditions = implode(" AND ", $conditions);
        $query .= " WHERE $conditions ";
 
        $result = $mysql->query($query);
        $mysql->close();
        return $result;
    }
}