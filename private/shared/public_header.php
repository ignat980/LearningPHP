<!doctype html>

<html lang="en">
  <head>
    <title>Globe Bank<?= isset($page_title) ? ' - '.htmlspecialchars($page_title) : '' ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo url_for('/index.php'); ?>">
          <img src="<?php echo url_for('/images/gbi_logo.png'); ?>" width="298" height="71" alt="" />
        </a>
      </h1>
    </header>
