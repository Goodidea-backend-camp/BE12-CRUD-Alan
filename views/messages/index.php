<?php require base_path('views/partials/head.php');?>
<?php use \Core\Session; ?>

<p> Hello, <?= Session::get('user')['name'] ?> </p>
<form action="/session" method="POST">
  <input type="hidden" name="_method" value="DELETE">
  <button>log out</button>
</form>

<!-- message board -->
<!-- list all messages -->
<ul>
  <?php foreach($messages as $message):?>
    <!-- author's own messages: colored border, edit/delete button -->
    <?php if ($message['user_id'] === $currentUserID): ?>
      <li class="author">
        <!-- view block: display message -->
        <div class="view-block" data-id="<?= $message['id'] ?>">
          <b><?= $message['name'] ?></b>
          <br />
          <?= htmlspecialchars($message['body']) ?>
        </div>
        <!-- edit block: edit the message -->
        <div class="edit-block hidden" data-id="<?= $message['id'] ?>">
          <b><?= $message['name'] ?></b>
          <br />
          <form action="/message" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?= $message['id']?>">
            <input type="text" name="body" value="<?= $message['body'] ?>">
            <button>send</button>
          </form>
        </div>

        <div>
          <!-- toggle edit <-> view -->
          <button class="edit-btn" data-id="<?= $message['id'] ?>">edit</button>
          <!-- click delete button to submit the delete form beneath -->
          <button class="delete-btn" data-id="<?= $message['id'] ?>">delete</button>
        </div>

        <!-- delete form: use delete button to submit this form -->
        <form action="/message" method="POST" class="hidden" data-id="<?= $message['id'] ?>">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="<?= $message['id']?>">
        </form>
      </li>
    <!-- display other's message normally-->
    <?php else: ?>
      <li>
        <b><?= $message['name'] ?></b>
        <br />
        <?= htmlspecialchars($message['body']) ?>
      </li>
    <?php endif;?>
  <?php endforeach;?>
</ul>

<!-- user create message here-->
<form action="/messages" method="POST">
  <input type="text" name="body">
  <button>send</button>
</form>

<!-- display error -->
<?php if (!is_null($error)): ?>
  <p class="error"><?= $error ?></p>
<?php endif; ?>

<script>
  // add event listener to each edit button, which would toggle each view-block and edit-block
  const editBtns = document.querySelectorAll('.edit-btn');

  editBtns.forEach(btn => {
    btn.addEventListener('click', () => toggleEdit(btn.dataset.id, btn));
  });

  function toggleEdit(id, btn) {
    const viewBlock = document.querySelector(`.view-block[data-id="${id}"]`);
    const editBlock = document.querySelector(`.edit-block[data-id="${id}"]`);

    if (editBlock.classList.contains('hidden')) {
      editBlock.classList.remove('hidden');
      viewBlock.classList.add('hidden');
      btn.textContent = 'cancel';
    } else {
      editBlock.classList.add('hidden');
      viewBlock.classList.remove('hidden');
      btn.textContent = 'edit';
    }
  }

  // add event listener to each delete button, which would submit the delete form
  const deleteBtns = document.querySelectorAll('.delete-btn');
  deleteBtns.forEach(btn => {
    btn.addEventListener('click', () => document.querySelector(`form[data-id="${btn.dataset.id}"]`).submit());
  });
</script>

<?php require base_path('views/partials/footer.php');?>
