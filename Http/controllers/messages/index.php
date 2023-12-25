<?php

use \Core\Session;

$config = require base_path('config.php');
$db = new \Core\Database($config['database']);
$messages = $db->query('select * from messages left join users on messages.user_id = users.id')->fetchAll();

// hard-coded for now, would be changed when implementing authentication
$currentID = 4;

// flash error message, only used for next request
$error = null;
if (Session::has('error')) {
  $error = Session::get('error');
  Session::unflash();
}

require base_path('views/messages/index.php');