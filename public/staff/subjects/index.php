<?php
  require_once '../../../private/initialize.php';

  $subject_set =  select_all('subjects');

  $page_title = 'Subjects';
  include SHARED_PATH.'/staff_header.php';
?>

<div id="content">
  <div class="subjects listing">
    <h1>Subjects</h1>

    <div class="actions">
      <a class="action" href="<?= url_for('/staff/subjects/new')?>">Create New Subject</a>
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

      <?php while ($subject = mysqli_fetch_assoc($subject_set)) { ?>
        <tr>
          <td><?= htmlspecialchars($subject['id']) ?></td>
          <td><?= htmlspecialchars($subject['position']) ?></td>
          <td><?= $subject['visible'] ? 'true' : 'false' ?></td>
    	    <td><?= htmlspecialchars($subject['menu_name']) ?></td>
          <td><a class="action" href="<?= url_for('/staff/subjects/show?id='.htmlspecialchars(urlencode($subject['id'])))?>">View</a></td>
          <td><a class="action" href="<?= url_for('/staff/subjects/edit?id='.htmlspecialchars(urlencode($subject['id'])))?>">Edit</a></td>
          <td><a class="action" href="<?= url_for('/staff/subjects/delete?id='.htmlspecialchars(urlencode($subject['id'])))?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
    <?php mysqli_free_result($subject_set)?>
  </div>
</div>

<?php include SHARED_PATH.'/staff_footer.php'?>
