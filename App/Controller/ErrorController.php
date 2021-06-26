<?php 
 
namespace App\Controller;

class ErrorController {
    public function createTableError() {
        $error = "Polling name alredy in use";
        require "App/Views/home.phtml";
    }
}