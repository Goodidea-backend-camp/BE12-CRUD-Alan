<?php require base_path('views/partials/head.php');?>
<?php require base_path('views/partials/nav.php');?>

<form action="/session" method="POST" id="login-form">
  <div>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="email" name="email" autocomplete="email" placeholder="email" required>
  </div>
  <div>
    <label for="new-password" class="sr-only">Password</label>
    <input type="password" id="current-password" name="password" autocomplete="current-password" placeholder="password" required>
  </div>
  <?php if (isset($error)): ?>
    <div class="error"><?=$error?></div>
  <?php endif; ?>
  <p>
    <button>log in</button>
  </p>
</form>

<?php require base_path('views/partials/footer.php');?>