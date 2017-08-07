<?php
  require_once '../../../private/initialize.php';

  $id = isset($_GET['id']) ? $_GET['id'] : '1';
  $page = find_by_id_from('pages', $id);
  $subject = find_by_id_from('subjects', $page['subject_id']);

  $page_title = "Show Page";
  include SHARED_PATH.'/staff_header.php';
?>

<div id="content">
  <a class="back-link" href=".">« Back to List</a><br>
  <div class="page show">
    <h1>Page: <?= htmlspecialchars($page['menu_name'])?></h1>

    <div class="attributes">
      <dl>
        <dt>Subject</dt>
        <dd><?= htmlspecialchars($subject['menu_name'])?></dd>
      </dl>
      <dl>
        <dt>Menu Name</dt>
        <dd><?= htmlspecialchars($page['menu_name'])?></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd><?= htmlspecialchars($page['position'])?></dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd><?= $page['visible'] ? 'true' : 'false'?></dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd><?= htmlspecialchars($page['content'])?></dd>
      </dl>
    </div>
  </div>
</div>

<?php include SHARED_PATH.'/staff_footer.php';;?>
