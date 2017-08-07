<?php
require_once '../../../private/initialize.php';

$page_set = select_all('pages');
$page_count = mysqli_num_rows($page_set) + 1;
mysqli_free_result($page_set);

$page =[
  'subject_id' => '',
  'menu_name' => '',
  'position' => $page_count,
  'visible' => '',
  'content' => ''
];

if (request_is_a('POST')) {
  $page['subject_id'] = (string)$_POST['subject_id'];
  $page['menu_name'] = (string)$_POST['menu_name'];
  $page['position'] = (string)$_POST['position'];
  $page['visible'] = (string)$_POST['visible'];
  $page['content'] = (string)$_POST['content'];

  $result = insert_page($page);
  if ($result === true) {
    redirect('/staff/pages/show?id='.mysqli_insert_id($db));
  } else {
    $errors = $result;
  }
}

  $page_title = 'Create Page';
  include SHARED_PATH.'/staff_header.php'
?>

<div id="content">
<a class="back-link" href=".">« Back to List</a>
  <div class="page new">
    <h1>Create Page</h1>
    <?= display_errors($errors)?>
    <form action="<?= url_for('/staff/pages/new')?>" method="post">
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
    <input type="submit" value="Create Page" >
  </div>
</form>
</div>
</div>

<?php include SHARED_PATH.'/staff_footer.php' ?>
