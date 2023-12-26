<?php require base_path('views/partials/head.php');?>
<?php require base_path('views/partials/nav.php');?>

<form action="/register" method="POST" id="registration-form">
  <div>
    <label for="name" class="sr-only">Name</label>
    <input type="text" id="name" name="name"  autocomplete="name" placeholder="name" required>
    <?php if(isset($errors['name'])): ?>
      <div class="error"><?= $errors['name'] ?></div>
    <?php endif;?>
  </div>
  <div>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="email" name="email"  autocomplete="email" placeholder="email" required>
    <?php if(isset($errors['email'])): ?>
      <div class="error"><?= $errors['email'] ?></div>
    <?php endif;?>
  </div>
  <div>
    <label for="new-password" class="sr-only">Password</label>
    <input type="password" id="new-password" name="password"  autocomplete="new-password" placeholder="password" aria-describedby="password-constraints" required>
    <?php if(isset($errors['password'])): ?>
      <div class="error"><?= $errors['password'] ?></div>
    <?php endif;?>
    <div id="password-constraints">Four or more characters.</div>
  </div>
  <p>
    <button>register</button>
  </p>
</form>

<?php require base_path('views/partials/footer.php');?>