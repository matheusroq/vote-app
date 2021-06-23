<?php

namespace App;

use PDO;
use PDOException;

class Connection {
    public static function db() {
        try{
            $con = new PDO('mysql:host=localhost;dbname=vote_app', 'root', '');
            return $con;
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }
}