<?php
use Cake\Routing\Router;

Router::plugin('AdmPlugin', function ($routes) {
    $routes->fallbacks();
});
