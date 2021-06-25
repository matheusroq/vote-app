<?php

namespace App\Controller;
use App\Model\Table;

class TableController {
    public function createTable() {
        Table::create();
        Table::insertFields();
        require "App/Views/vote.phtml";
    }
}