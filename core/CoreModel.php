<?php

namespace Core;

use Config\DB;

class CoreModel {

    public $db = null;
    public $table;
    public $out=array();

    public function __construct($table) {
        $this->db = DB::connToDB();
        $this->table = $table;
    }

    public function all() {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->db->prepare($sql);
        $result->execute();
        while($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $this->out[] = $row;
        }
        return $this->out;
    }

    public function getById($id) {
        $result = array();
        $sql = "SELECT * FROM ". $this->table." WHERE id= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(empty($result)) {
            return false;
        } else {
            return $result;
        }

    }

    public function count()
    {
        $sql="SELECT count(*) AS c FROM ".$this->table;
        $result = $this->db->prepare($sql);
        $result->execute();
        $count = $result->fetch(\PDO::FETCH_OBJ);
        return $count->c;
    }

}
