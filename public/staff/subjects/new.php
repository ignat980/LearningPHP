<?php
  require_once '../../../private/initialize.php';

  $subject_set = select_all('subjects');
  $subject_count = mysqli_num_rows($subject_set) + 1;
  mysqli_free_result($subject_set);

  $subject =[
    'menu_name' => '',
    'position' => $subject_count,
    'visible' => ''
  ];

  if (request_is_a('POST')) {
    $subject['menu_name'] = (string)$_POST['menu_name'];
    $subject['position'] = (string)$_POST['position'];
    $subject['visible'] = (string)$_POST['visible'];

    $result = insert_subject($subject);
    if ($result === true) {
      redirect('/staff/subjects/show?id='.mysqli_insert_id($db));
    } else {
      $errors = $result;
    }
  }

  $page_title = 'Create Subject';
  include SHARED_PATH.'/staff_header.php'
?>

<div id="content">
  <a class="back-link" href=".">« Back to List</a>
  <div class="subject new">
    <h1>Create Subject</h1>
    <?= display_errors($errors)?>
    <form action="<?= url_for('/staff/subjects/new')?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?= htmlspecialchars($subject['menu_name'])?>" ></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php
              for ($i=1; $i <= $subject_count; $i++) {
                echo "<option value=\"{$i}\"";
                if ($subject['position'] == $i) {
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
          <input type="checkbox" name="visible" value="1"<?= $subject['visible'] == '1' ? ' checked' : null?>>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Subject" >
      </div>
    </form>
  </div>
</div>

<?php include SHARED_PATH.'/staff_footer.php' ?>
