<?php

namespace App;

use Init\Bootstrap;

class Route extends Bootstrap {
    public function initRoutes()
    {
        $routes['home'] = [
            'route' => '/',
            'controller' => 'home',
            'action' => 'home'
        ];
        $routes['vote'] = [
            'route' => '/vote',
            'controller' => 'vote',
            'action' => 'vote'
        ];
        $routes['table'] = [
            'route' => '/create',
            'controller' => 'table',
            'action' => 'createTable'
        ];
       $this->__set('routes', $routes);
    }
}