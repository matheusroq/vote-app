<?php

namespace App\Controller;
use App\Model\Table;

class TableController {
    public function createTable() {
        //Table::create();
        //Table::insertFields();
        $this->index();
    }

    public function index() {

        $fieldsName = Table::getTableFields($_POST['table_name']);
        $fields = [];
        foreach($fieldsName as $f) {
            $fields['id'][] = $f->id;
            $fields['fields'][] = $f->fields; 
        }

        require "App/Views/vote.phtml";
    }
}