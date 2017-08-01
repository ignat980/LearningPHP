<?php
  require_once '../../../private/initialize.php';

  // TODO: Stop using hardcoded database
  $pages = [
    ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'First'],
    ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Second'],
    ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Third'],
    ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Fourth'],
  ];

  $page_title = 'Pages';
  include SHARED_PATH.'/staff_header.php';
?>

<div id="content">
  <div class="pages listing">
    <h1>Pages</h1>

    <div class="actions">
      <a class="action" href="#">Create New Page</a>
    </div>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
        <th>Name</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($pages as $page) { ?>
        <tr>
          <td><?= htmlspecialchars($page['id']) ?></td>
          <td><?= htmlspecialchars($page['position']) ?></td>
          <td><?= $page['visible'] ? 'true' : 'false' ?></td>
          <td><?= htmlspecialchars($page['menu_name']) ?></td>
          <td><a class="action" href="<?= url_for('/staff/pages/show?id='.htmlspecialchars(urlencode($page['id'])))?>">View</a></td>
          <td><a class="action" href="#">Edit</a></td>
          <td><a class="action" href="#">Delete</a></td>
        </tr>
      <?php } ?>
    </table>
  </div>
</div>

<?php include SHARED_PATH.'/staff_footer.php'?>
