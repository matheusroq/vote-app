<?php

namespace Config;

use Illuminate\Database\Capsule\Manager as Capsule;

class DB {
    public static function db() {
        $capsule = new Capsule;
        
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'vote_app',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        return $capsule;
    }
}

