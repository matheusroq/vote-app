<?php

namespace App\Model;
use App\Connection;
use Config\DB;


class Vote {
    public static function vote() {
        DB::db()->table('candidates')
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