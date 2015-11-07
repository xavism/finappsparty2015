<?php
/**
 * Created by PhpStorm.
 * User: xavisanchezmir
 * Date: 7/11/15
 * Time: 6:10
 */
class Registres_Model extends Model {

    function __contstruct () {
        parent::__construct();
        $this->table = "registres";
    }

    function getRegistreById($id) {
        return $this->find("all", array(
            "order" => array(
                "time" => "DESC"
            ),
            "conditions" => array(
                "id_sensor =" => $id
            )
        ));
    }
}
?>