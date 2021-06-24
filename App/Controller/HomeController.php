<?php

namespace App\Controller;

use Config\DB;

class HomeController {

    public function home() {
        require "App/Views/home.phtml";
    }
}