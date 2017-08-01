<?php
  require_once '../../../private/initialize.php';

  $id = isset($_GET['id']) ? $_GET['id'] : '1';

  $page_title = "Show Page";
  include SHARED_PATH.'/staff_header.php';
?>

<div id="content">
  <div class="actions">
    <a class="action" href=".">« Back to List</a><br>
    Page ID: <?= htmlspecialchars($id)?>
  </div>

</div>
<?php include SHARED_PATH.'/staff_footer.php';;?>
