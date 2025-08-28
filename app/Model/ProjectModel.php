<?php
namespace App\Model;

use App\Config\Database;
use ppb\Library\Msg;

class ProjectModel extends Database
{
    public function readProject()
    {
        $pdo = $this->linkDB();
        $sql = "SELECT id, name FROM project";

        try {
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            new Msg(true, null, $e);
        }

        $sth = $pdo->prepare($sql);
        $sth->execute();

        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        $sth->closeCursor();
        $pdo = null;
        // fetch all
        return $result;
                
    } 
}