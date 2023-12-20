<?php require base_path('views/partials/head.php');?>

<ul>
  <?php foreach($messages as $message):?>
    <!-- marked the author's own messages -->
    <li class="<?= $message['user_id'] === $currentID ? 'marked' : '' ?>">
      <b><?= $message['name'] ?></b>
      <br />
      <?= $message['body'] ?>
    </li>
  <?php endforeach;?>
</ul>

<?php require base_path('views/partials/footer.php');?>
