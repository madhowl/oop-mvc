<?php

namespace Core;

use Config\DB;
//use Config\App;
use Config\SQLiteConnection;

class CoreModel {

    public $db = null;
    public $table;
    public $out=array();

    public function __construct($table) {
        $this->db = DB::connToDB();
        //$this->db = SQLiteConnection::connToDB();
        $this->table = $table;
    }

    public function all() {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
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

    /**
     * @return integer количество записей в таблице
     */
    public function count()
    {
        $sql="SELECT count(*) AS c FROM ".$this->table;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetch(\PDO::FETCH_OBJ);
        return $count->c;
    }

}
