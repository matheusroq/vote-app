<?php

namespace App\Model;
use Config\DB;

class Table {
    public static function create() {
          DB::db()->schema()->create($_POST['table_name'], function($table) {
            $table->increments('id');
            for ($i=0; $i < count($_POST) - 1 ; $i++) { 
                $table->string($_POST['name'.$i]);
            }
            $table->integer('votes');
        });  
    }
}