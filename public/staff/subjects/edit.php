<?php
  require_once '../../../private/initialize.php';

  if (! isset($_GET['id'])){
    redirect('staff/subjects/');
  }
  $id = $_GET['id'];

  if (request_is_a('POST')) {
    $subject =[
      'id' => $id,
      'menu_name' => (string)$_POST['menu_name'],
      'position' => (string)$_POST['position'],
      'visible' => (string)$_POST['visible']
    ];

    update_subject($subject);
    redirect("/staff/subjects/show?id={$id}");
  } else {
    $subject = find_by_id_from('subjects', $id);

    $subject_set = select_all('subjects');
    $subject_count = mysqli_num_rows($subject_set);
    mysqli_free_result($subject_set);
  }

  $page_title = 'Edit Subject';
  include SHARED_PATH.'/staff_header.php'
?>

<div id="content">
  <a class="back-link" href=".">« Back to List</a>
  <div class="subject edit">
    <h1>Edit Subject</h1>
    <form action="<?= url_for('/staff/subjects/edit?id='), htmlspecialchars(urlencode($id))?>" method="post">
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
          <input type="checkbox" name="visible" value="1"<?= $subject['visible'] == '1' ? ' checked' : null?> />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Subject">
      </div>
    </form>
  </div>
</div>

<?php include SHARED_PATH.'/staff_footer.php' ?>
