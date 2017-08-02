<?php
  require_once '../../../private/initialize.php';

  $menu_name = '';
  $position = '';
  $visible = '';

  if (request_is_a('POST')) {
    $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
    $position = isset($_POST['position']) ? $_POST['position'] : '';
    $visible = isset($_POST['visible']) ? $_POST['visible'] : '';

    echo 'Form parameters<br>';
    echo "Menu name: ${menu_name}<br>";
    echo "Position: ${position}<br>";
    echo "Visible: ${visible}<br>";
  }

  $page_title = 'Create Page';
  include SHARED_PATH.'/staff_header.php'
?>

<div id="content">
  <a class="back-link" href=".">« Back to List</a>
  <div class="page new">
    <h1>Create Page</h1>

    <form action="<?= url_for('/staff/pages/new')?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?= htmlspecialchars($menu_name)?>" ></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <option value="1"<<?= $position == "1" ? ' selected' : null; ?>>1</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0">
          <input type="checkbox" name="visible" value="1"<?= $visible == '1' ? ' checked' : null?>>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Page">
      </div>
    </form>
  </div>
</div>

<?php include SHARED_PATH.'/staff_footer.php' ?>
