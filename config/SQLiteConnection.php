<?php


namespace Config;


class SQLiteConnection {

    public $pdo = null;


    public function connToDB() {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:" . App::PATH_TO_SQLITE_FILE);
            if (!filesize(self::SQLITE_FILE))
                throw new \Exception('There are no tables in the database!');
        }
        return $this->pdo;
    }
}