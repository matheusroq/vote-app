<?php

namespace App;

use Init\Bootstrap;

class Route extends Bootstrap {
    public function initRoutes()
    {
        $routes['home'] = [
            'route' => '/',
            'controller' => 'home',
            'action' => 'index'
        ];
        $routes['vote'] = [
            'route' => '/vote',
            'controller' => 'vote',
            'action' => 'vote'
        ];
       $this->__set('routes', $routes);
    }
}