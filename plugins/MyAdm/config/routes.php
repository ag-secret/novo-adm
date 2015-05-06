<?php
use Cake\Routing\Router;

Router::plugin('MyAdm', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
