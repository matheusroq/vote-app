<?php

namespace App\Controller;

use App\Connection;

class VoteController {
    private $id;


    public function __set($attr, $value) {
        $this->$attr = $value;
    }
    public function __get($attr) {
        return $this->$attr;
    }

    public function vote() {
        $con = Connection::db();
        $query = 'update candidates set votes = votes + 1 where id = :id ';
        $stmt = $con->prepare($query);
        $stmt->bindValue('id', $_GET['id']);
        $stmt->execute();

        $this->showVotes();
    }

    public function votePerCandidate() {
        $con = Connection::db();
        $query = 'select name, votes from candidates where id = :id';
        $stmt = $con->prepare($query);
        $stmt->bindValue('id', $_GET['id']);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function totalVotes() {
        $con = Connection::db();
        $query = 'select sum(votes) as total from candidates';
        $stmt = $con->prepare($query);
        $stmt->bindValue('id', $_GET['id']);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function showVotes() {
        session_start();
        $votesPerCandidate = $this->votePerCandidate();
        $totalVotes = $this->totalVotes();

        $_SESSION['votes'] = $votesPerCandidate;
        $_SESSION['total'] = $totalVotes;

        require "App/Views/storedVote.phtml";
    }
}