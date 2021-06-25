<?php

namespace App\Model;
use Config\DB;

class Table {
    public static function create() {
          DB::db()->schema()->create($_POST['table_name'], function($table) {
            $table->increments('id');
            $table->string('campos');
            $table->integer('votes');
        });  
    }
    public static function insertFields() {
        for ($i=0; $i < count($_POST) - 1 ; $i++) { 
            DB::db()->table($_POST['table_name'])->insert(([
                'campos' =>   $_POST['name'.$i]
            ]));
        }
    }
}