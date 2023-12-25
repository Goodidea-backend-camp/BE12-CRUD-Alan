<?php

use \Core\Session;
use \Core\Database;
$config = require base_path('config.php');
$db = new Database($config['database']);
$messages = $db->query('
  SELECT 
    messages.*,
    users.name,
    users.email
  FROM messages 
  LEFT JOIN users on messages.user_id = users.id
')->fetchAll();

// hard-coded for now, would be changed when implementing authentication
$currentUserID = 4;

// flash error message, only used for next request
$error = null;
if (Session::has('error')) {
  $error = Session::get('error');
  Session::unflash();
}

require base_path('views/messages/index.php');