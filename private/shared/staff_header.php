<?php
  if (!isset($page_title))
    $page_title = "Staff Area";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GBI - <?= $page_title ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" media="all" href="<?= url_for('/stylesheets/staff.css')?>">
  </head>
  <body>
    <header>
      <h1>GBI Staff Area</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?= url_for('/staff/')?>">Menu</a></li>
      </ul>
    </navigation>
