<?php
  require_once('../../../private/initialize.php');

  if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
  }
  $id = $_GET['id'];

  if(request_is_a('POST')) {
    delete_subject($id);
    redirect('/staff/subjects/');
  } else {
    $subject = find_by_id_from('subjects', $id);
  }

  $page_title = 'Delete Subject';
  include SHARED_PATH.'/staff_header.php'
?>

<div id="content">
  <a class="back-link" href=".">« Back to List</a>
  <div class="subject delete">
    <h1>Delete Subject</h1>
    <p>Are you sure you want to delete this subject?</p>
    <p class="item"><b><?= htmlspecialchars($subject['menu_name']); ?></b></p>
    <form action="<?= url_for("/staff/subjects/delete?id="), htmlspecialchars(urlencode($subject['id'])) ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Subject">
      </div>
    </form>
  </div>
</div>

<?php include SHARED_PATH.'/staff_footer.php' ?>
