<?php require base_path('views/partials/head.php');?>

<ul>
  <?php foreach($messages as $message):?>
    <!-- marked the author's own messages -->
    <li class="<?= $message['user_id'] === $currentID ? 'author-name' : '' ?>">
      <b><?= $message['name'] ?></b>
      <br />
      <?= $message['body'] ?>
    </li>
  <?php endforeach;?>
</ul>

<form action="/messages" method="POST">
  <input type="text" name="body">
  <button>enter</button>
</form>


<?php if (!is_null($error)): ?>
  <p class="error"><?= $error ?></p>
<?php endif; ?>

<?php require base_path('views/partials/footer.php');?>
