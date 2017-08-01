<?php
  require_once '../../../private/initialize.php';

  // TODO: Stop using hardcoded database
  $subjects = [
    ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'About Globe Bank'],
    ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
    ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
    ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial'],
  ];

  $page_title = 'Subjects';
  include SHARED_PATH.'/staff_header.php';
?>

<div id="content">
  <div class="subjects listing">
    <h1>Subjects</h1>

    <div class="actions">
      <a class="action" href="#">Create New Subject</a>
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

      <?php foreach ($subjects as $subject) { ?>
        <tr>
          <td><?= htmlspecialchars($subject['id']) ?></td>
          <td><?= htmlspecialchars($subject['position']) ?></td>
          <td><?= $subject['visible'] ? 'true' : 'false' ?></td>
          <td><?= htmlspecialchars($subject['menu_name']) ?></td>
          <td><a class="action" href="<?= url_for('/staff/subjects/show?id='.htmlspecialchars(urlencode($subject['id'])))?>">View</a></td>
          <td><a class="action" href="#">Edit</a></td>
          <td><a class="action" href="#">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
  </div>
</div>

<?php include SHARED_PATH.'/staff_footer.php'?>
