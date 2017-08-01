<?php
  require_once '../../../private/initialize.php';

  if (! isset($_GET['id'])){
    redirect('staff/subjects/');
  }
  $id = $_GET['id'];
  $menu_name = '';
  $position = '';
  $visible = '';

  $test = isset($_GET['test']) ? $_GET['test'] : '';

  if (is_request_a('POST')) {
    $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
    $position = isset($_POST['position']) ? $_POST['position'] : '';
    $visible = isset($_POST['visible']) ? $_POST['visible'] : '';

    echo 'Form parameters<br>';
    echo "Menu name: ${menu_name}<br>";
    echo "Position: ${position}<br>";
    echo "Visible: ${visible}<br>";
  }

  $page_title = 'Edit Subject';
  include SHARED_PATH.'/staff_header.php'
?>

<div id="content">
  <a class="back-link" href=".">« Back to List</a>
  <div class="subject edit">
    <h1>Edit Subject</h1>

    <form action="<?= url_for('/staff/subjects/edit?id='.htmlspecialchars(urlencode($id)))?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?= $menu_name?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <option value="1">1</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Subject" />
      </div>
    </form>
  </div>
</div>

<?php include SHARED_PATH.'/staff_footer.php' ?>
