<?php 

use Core\Database;
use Core\Session;


// hard-coded for testing. would be changed when implementing authentication
$currentUserID = 3;

$config = require base_path('config.php');
$db = new Database($config['database']);

$message = $_POST['body'];

// if input message is empty or it consists of only spaces, flash the error message 
if (empty(trim($message))) {
  Session::flash('error', 'message cannot be empty!');
} else {
  $db->query('INSERT INTO messages(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => $currentUserID
  ]);
}

header('location: /');
exit();