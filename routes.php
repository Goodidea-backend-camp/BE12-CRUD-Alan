<?php

// create
$router->post('/messages', 'messages/create.php');

// read
$router->get('/', 'messages/index.php');

// update
$router->put('/message', 'messages/update.php');

// delete
$router->delete('/message', 'messages/destroy.php');

// register
$router->get('/register', 'registration/create.php');
$router->post('/register', 'registration/store.php');
