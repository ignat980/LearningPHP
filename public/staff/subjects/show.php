<?php
  require_once '../../../private/initialize.php';

  $page_title = "Show Subject";
  include SHARED_PATH.'/staff_header.php';

  $id = isset($_GET['id']) ? $_GET['id'] : '1';
?>

<div id="content">
  <div class="actions">
    <a class="action" href=".">« Back to List</a><br>
    Subject ID: <?= htmlspecialchars($id)?>
  </div>

</div>
<?php include SHARED_PATH.'/staff_footer.php';;?>
