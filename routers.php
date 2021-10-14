<?php
RouterList::addRouter([
    'url_path' => '/',
    'handler' => 'HomeController@index'
]);

RouterList::addRouter([
    'url_path' => '/login',
    'handler' => 'LoginController@index'
]);