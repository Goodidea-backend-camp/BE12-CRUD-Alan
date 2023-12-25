<?php

// create
$router->post('/messages', 'messages/create.php');

// read
$router->get('/', 'messages/index.php');
