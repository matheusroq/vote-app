<?php

namespace App\Model;
use Config\DB;


class Vote {
    public static function vote() {
        session_start();
        DB::db()->table($_SESSION['table_name'])
                ->where('id', $_GET['id'])
                ->increment('votes', 1);
        return true;
    }

    public static function votePerCandidate($id) {
       $votePerCandidate= DB::db()->table('candidates')
                ->select('name', 'votes')
                ->where('id', $id)
                ->get();
        $candidateInfo = [];
                foreach($votePerCandidate as $candidate) {
          
                    $candidateInfo[] = $candidate->name;
                    $candidateInfo[] = $candidate->votes;
                }

                return $candidateInfo;
    }
    public static function  totalVotes() {
        $total = DB::db()->table('candidates')
                ->sum('votes');
        return $total;

    }
}