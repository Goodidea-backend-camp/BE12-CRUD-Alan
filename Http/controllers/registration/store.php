<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

if (empty(trim($name))) {
  $errors['name'] = 'Name should not be empty';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors['email'] = 'Please input valid email address';
}
if (strlen($password) < 4) {
  $errors['password'] = 'Password should be at least 4 characters';
}
if(!empty($errors)) {
  return view('registration/create.view.php', [
    'errors' => $errors
  ]);
}

$user = $db->query('SELECT * FROM users WHERE email = :email', [
  'email' => $email
])->fetch();

// register the user if the email haven't been registered
if(!$user) {
  $user = $db->query('INSERT INTO users(email, name, password) VALUES(:email, :name, :password)', [
    'email' => $email,
    'name' => $name,
    'password' => password_hash($password, PASSWORD_BCRYPT) 
  ]);

  $temporaryMessage = 'Registration succeeded';
} else {
  $temporaryMessage = 'Registration failed';
}

return view('temporary.view.php', [
  'temporaryMessage' => $temporaryMessage
]);
