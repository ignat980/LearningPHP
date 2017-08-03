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
    $subject['menu_name'] = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
    $subject['position'] = isset($_POST['position']) ? $_POST['position'] : '';
    $subject['visible'] = isset($_POST['visible']) ? $_POST['visible'] : '';

    insert_subject($subject);
    redirect('/staff/subjects/show?id='.mysqli_insert_id($db));
  }

  $page_title = 'Create Subject';
  include SHARED_PATH.'/staff_header.php'
?>

<div id="content">
  <a class="back-link" href=".">« Back to List</a>
  <div class="subject new">
    <h1>Create Subject</h1>
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
