<?php

namespace App\Config;

use ppb\Library\Msg;

abstract class Database {
    
    /**
     * Zugangsdaten für die Datenbank 
     */
    private $dbName = "vpr_pbat3h23a"; //Datenbankname
    private $linkName = "mysql.pb.bib.de"; //Datenbank-Server
    private $user = "vpr_pbat3h23a"; //Benutzername
    private $pw = "SBHwIWNqmMevnlqt"; //Passwort
    
    /**
     * Stellt eine Verbindung zur Datenbank her
     * 
     * @return \PDO Gibt eine Datenbankverbindung zurueck
     */
    public function linkDB() {
        try {
            $pdo = new \PDO("mysql:dbname=$this->dbName;host=$this->linkName"
                , $this->user
                , $this->pw
                , [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
            return $pdo;
        } catch (\PDOException $e) {
            new Msg(true, null, $e);
            throw $e;
        }
    }

    /**
     * Zum serverseitigen generieren einer UUID
     * 
     * @return string Liefert eine UUID
     */
    public function createUUID()
    {
        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    } 
}