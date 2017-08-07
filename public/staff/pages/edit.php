<?php
  require_once '../../../private/initialize.php';

  if (!isset($_GET['id'])){
    redirect('staff/pages/');
  }
  $id = $_GET['id'];

  if (request_is_a('POST')) {
    $page =[
      'id' => $id,
      'subject_id' => isset($_POST['subject_id']) ? $_POST['subject_id'] : '',
      'menu_name' => isset($_POST['menu_name']) ? $_POST['menu_name'] : '',
      'position' => isset($_POST['position']) ? $_POST['position'] : '',
      'visible' => isset($_POST['visible']) ? $_POST['visible'] : '',
      'content' => isset($_POST['content']) ? $_POST['content'] : ''
    ];

    $result = update_page($page);
    if ($result === true) {
      redirect("/staff/pages/show?id={$id}");
    } else {
      $errors = $result;
    }
  } else {
    $page = find_by_id_from('pages', $id);
  }

  $page_set = select_all('pages');
  $page_count = mysqli_num_rows($page_set);
  mysqli_free_result($page_set);

  $page_title = 'Edit Page';
  include SHARED_PATH.'/staff_header.php'
?>

<div id="content">
  <a class="back-link" href=".">« Back to List</a>
  <div class="page edit">
    <h1>Edit Page</h1>
    <?= display_errors($errors)?>
    <form action="<?= url_for('/staff/pages/edit?id='), htmlspecialchars(urlencode($id))?>" method="post">
      <dl>
        <dt>Subject</dt>
        <dd>
          <select name="subject_id">
          <?php
          $subject_set = select_all('subjects');
          while ($subject = mysqli_fetch_assoc($subject_set)) {
            echo "<option value=\"".htmlspecialchars($subject['id'])."\"";
            if ($page['subject_id'] == $subject['id']) {
              echo " selected";
            }
            echo ">". htmlspecialchars($subject['menu_name'])."</option>";
          }
          mysqli_free_result($subject_set);
        ?>
      </select>
    </dd>
  </dl>
  <dl>
    <dt>Menu Name</dt>
    <dd><input type="text" name="menu_name" value="<?= htmlspecialchars($page['menu_name'])?>" ></dd>
  </dl>
  <dl>
    <dt>Position</dt>
    <dd>
      <select name="position">
        <?php
          for ($i=1; $i <= $page_count; $i++) {
            echo "<option value=\"{$i}\"";
            if ($page['position'] == $i) {
              echo " selected";
            }
            echo ">{$i}</option>";
          }
        ?>
      </select>
    </dd>
  </dl>
  <dl>
    <dt>Visible</dt>
    <dd>
      <input type="hidden" name="visible" value="0">
      <input type="checkbox" name="visible" value="1"<?= $page['visible'] == '1' ? ' checked' : null?>>
    </dd>
  </dl>
  <dl>
    <dt>Content</dt>
    <dd>
      <textarea name="content" rows="10" cols="60"><?= htmlspecialchars($page['content'])?></textarea>
    </dd>
  </dl>
  <div id="operations">
    <input type="submit" value="Edit Page" >
  </div>
</form>
</div>
</div>

<?php include SHARED_PATH.'/staff_footer.php' ?>
