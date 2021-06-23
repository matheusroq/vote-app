<?php

namespace App\Controller;

class HomeController {

    public function index() {
        require "App/Views/vote.phtml";
    }
}