<?php

namespace App\Controller;

use App\Model\Vote;


class VoteController {

    public function __set($attr, $value) {
        $this->$attr = $value;
    }
    public function __get($attr) {
        return $this->$attr;
    }

    public function vote() {
       Vote::vote();
        $this->showVotes();
    }

    public function showVotes() {
        $votesPerCandidate = Vote::votePerCandidate($_SESSION['table_name'],$_GET['id']);
        $totalVotes = Vote::totalVotes($_SESSION['table_name']);

        $_SESSION['votes'] = $votesPerCandidate;
        $_SESSION['total'] = $totalVotes;

        require "App/Views/storedVote.phtml";
    }
}