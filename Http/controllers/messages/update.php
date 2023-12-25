<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserID = 3; 

$message = $db->query('SELECT * FROM messages WHERE id = :id', [
  'id' => $_POST['id']
])->fetch();

if (!$message) {
  abort();
}

if ($currentUserID === $message['user_id']) {
  $db->query('update messages set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
  ]);
} else {
  abort(403);
}

header('location: /');
exit();