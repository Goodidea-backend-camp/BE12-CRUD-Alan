<?php use Core\Session; ?>
<nav>
  <?php if (Session::has('user')): ?>
    <a href="/">board</a>
  <?php endif;?>
  <a href="/register">register</a>
  <a href="/login">login</a>
</nav>