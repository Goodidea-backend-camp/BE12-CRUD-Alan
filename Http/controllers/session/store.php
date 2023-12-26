<?php

use Core\Database;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$config = require base_path('config.php');
$db = new Database($config['database']);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
  'email' => $email
])->fetch();

if ($user) {
  if (password_verify($password, $user['password'])) {
    Session::put('user', $email);
    header('location: /');
    exit();
  }
  // think about how to check the session contains the user, and fulfill logout and set different permission to different pages(using middleware)
}

// return to the login page if the credentials are wrong or the email is not found
return view('session/create.view.php', [
  // vague hint so that user won't know if the email already been registered.
  'error' => 'No matching account found for that email address and password.'
]);
