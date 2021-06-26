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

    public static function votePerCandidate($tableName, $id) {
       $votePerCandidate= DB::db()->table($tableName)
                ->select('fields', 'votes')
                ->where('id', $id)
                ->get();
        $candidateInfo = [];
                foreach($votePerCandidate as $candidate) {
          
                    $candidateInfo[] = $candidate->fields;
                    $candidateInfo[] = $candidate->votes;
                }

                return $candidateInfo;
    }
    public static function  totalVotes($tableName) {
        $total = DB::db()->table($tableName)
                ->sum('votes');
        return $total;

    }
}