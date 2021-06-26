<?php

namespace App\Controller;
use App\Model\Table;

class TableController {
    public function createTable() {
        Table::create();
        Table::insertFields();
        //$this->index();
        session_start();
        $_SESSION['table_name'] = $_POST['table_name'];
        require "App/Views/votePage.phtml";
    }

    public function index() {
        session_start();
        $fieldsName = Table::getTableFields($_SESSION['table_name']);
        $fields = [];
        foreach($fieldsName as $f) {
            $fields['id'][] = $f->id;
            $fields['fields'][] = $f->fields; 
        }

        require "App/Views/vote.phtml";
    }
}