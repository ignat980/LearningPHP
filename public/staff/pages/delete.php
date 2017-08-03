<?php
  require_once('../../../private/initialize.php');

  if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/pages/index.php'));
  }
  $id = $_GET['id'];

  if(request_is_a('POST')) {
    delete_page($id);
    redirect('/staff/pages/');
  } else {
    $page = find_by_id_from('pages', $id);
  }

  $page_title = 'Delete Page';
  include SHARED_PATH.'/staff_header.php'
?>

<div id="content">
  <a class="back-link" href=".">« Back to List</a>
  <div class="page delete">
    <h1>Delete Page</h1>
    <p>Are you sure you want to delete this page?</p>
    <p class="item"><b><?= htmlspecialchars($page['menu_name']); ?></b></p>
    <form action="<?= url_for("/staff/pages/delete?id="), htmlspecialchars(urlencode($page['id'])) ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Page">
      </div>
    </form>
  </div>
</div>

<?php include SHARED_PATH.'/staff_footer.php' ?>
