<?php

$config = require base_path('config.php');
$db = new \Core\Database($config['database']);
$messages = $db->query('select * from messages left join users on messages.user_id = users.id')->fetchAll();

// hard-coded for testing style. would be changed when implementing authentication
$currentID = 4;

require base_path('views/messages/index.php');