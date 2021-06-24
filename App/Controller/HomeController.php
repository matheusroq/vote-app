<?php

namespace App\Controller;

use Config\DB;

class HomeController {

    public function index() {
        require "App/Views/vote.phtml";
    }
}