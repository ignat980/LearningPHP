<?php
  require_once '../../../private/initialize.php';

  $page_title = "Show Subject";
  include SHARED_PATH.'/staff_header.php';

  $id = isset($_GET['id']) ? $_GET['id'] : '1';

  $subject = find_subject_by_id($id);

?>

<div id="content">
  <a class="back-link" href=".">« Back to List</a><br>

    <div class="subject show">
      <h1>Subject: <?= htmlspecialchars($subject['menu_name'])?></h1>

      <div class="attributes">
        <dl>
          <dt>Menu Name</dt>
          <dd><?= htmlspecialchars($subject['menu_name'])?></dd>
        </dl>
        <dl>
          <dt>Position</dt>
          <dd><?= htmlspecialchars($subject['position'])?></dd>
        </dl>
        <dl>
          <dt>Visible</dt>
          <dd><?= $subject['visible'] ? 'true' : 'false'?></dd>
        </dl>
      </div>
    </div>

</div>
<?php include SHARED_PATH.'/staff_footer.php';;?>
