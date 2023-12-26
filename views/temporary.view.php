<?php require base_path('views/partials/head.php');?>

<h1><?=$temporaryMessage?> <br>Redirect in 3 seconds</h1>

<style>
  body {
    margin-block: 20%;
  }
</style>

<script>
  setTimeout(function() {
      window.location.href = "<?= $redirectLocation ?>";
  }, 3000); 
</script>

<?php require base_path('views/partials/footer.php');?>
