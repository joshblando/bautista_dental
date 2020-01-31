<?php
include 'nav.php';
?>

  <div class="card-container">
    <div class="card">CARD 1</div>
    <div class="card">CARD 2</div>
    <div class="card">CARD 3</div>
  </div>
  <div class="main-content white-bg">
    <h1><?php
        echo $_SESSION['lastName']
        ?></h1>
  </div>
<?php
include 'footer.php';
?>