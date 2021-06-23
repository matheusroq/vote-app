<?php

namespace App\Model;
use App\Connection;

class Vote {
    public static function vote() {
        $con = Connection::db();
        $query = 'update candidates set votes = votes + 1 where id = :id ';
        $stmt = $con->prepare($query);
        $stmt->bindValue('id', $_GET['id']);
        $stmt->execute();
        return true;
    }

    public static function votePerCandidate($id) {
        $con = Connection::db();
        $query = 'select name, votes from candidates where id = :id';
        $stmt = $con->prepare($query);
        $stmt->bindValue('id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function  totalVotes() {
        $con = Connection::db();
        $query = 'select sum(votes) as total from candidates';
        $stmt = $con->prepare($query);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}