<?php
use Cake\Routing\Router;

Router::plugin('InteragirAdmGenerator', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
