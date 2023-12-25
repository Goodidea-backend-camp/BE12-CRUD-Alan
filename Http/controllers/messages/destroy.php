<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserID = 4;

$message = $db->query('SELECT * FROM messages WHERE id = :id', [
  'id' => $_POST['id']
])->fetch();

if (!$message) {
  abort();
}

if ($currentUserID === $message['user_id']) {
  $db->query('DELETE FROM messages WHERE id = :id', [
    'id' => $_POST['id']
  ]);
} else {
  abort(403);
}

header('location: /');
exit();
