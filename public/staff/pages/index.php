<?php
  require_once '../../../private/initialize.php';

  $page_set = select_all('pages');

  $page_title = 'Pages';
  include SHARED_PATH.'/staff_header.php';
?>

<div id="content">
  <div class="pages listing">
    <h1>Pages</h1>

    <div class="actions">
      <a class="action" href="<?= url_for('/staff/pages/new')?>">Create New Page</a>
    </div>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>Subject</th>
        <th>Position</th>
        <th>Visible</th>
        <th>Name</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php while ($page = mysqli_fetch_assoc($page_set)) {
        $subject = find_by_id_from('subjects', $page['subject_id'])?>
        <tr>
          <td><?= htmlspecialchars($page['id']) ?></td>
          <td><?= htmlspecialchars($subject['menu_name']) ?></td>
          <td><?= htmlspecialchars($page['position']) ?></td>
          <td><?= $page['visible'] ? 'true' : 'false' ?></td>
          <td><?= htmlspecialchars($page['menu_name']) ?></td>
          <td><a class="action" href="<?= url_for('/staff/pages/show?id='.htmlspecialchars(urlencode($page['id'])))?>">View</a></td>
          <td><a class="action" href="<?= url_for('/staff/pages/edit?id='.htmlspecialchars(urlencode($page['id'])))?>">Edit</a></td>
          <td><a class="action" href="<?= url_for('/staff/pages/delete?id='.htmlspecialchars(urlencode($page['id'])))?>">Delete</a></td>
        </tr>
      <?php } ?>
    </table>
    <?php mysqli_free_result($page_set)?>
  </div>
</div>

<?php include SHARED_PATH.'/staff_footer.php'?>
