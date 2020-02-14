<?php


namespace App\blog;


use Core\CoreModel;


class PostsModel extends CoreModel
{
    public $lastPosts = array();
    public function getLastPost($howmany = 3){
        $sql = "SELECT * FROM " . $this->table ." ORDER BY id DESC  LIMIT ".$howmany;

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $this->lastPosts[] = $row;
        }
        return $this->lastPosts;
    }
}