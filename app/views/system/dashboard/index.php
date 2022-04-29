<?php
session_start();
if (!isset($_SESSION["login"])) :
  header('Location: home');
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>News.com</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= BASEURL; ?>/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/trix.css">
  <script type="text/javascript" src="<?= BASEURL; ?>/javascript/trix.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }
  </style>
</head>

<body id="body">
  <div class="container-dashboard-nav">
    <div class="dashboard-nav">
      <h1>DASHBOARD</h1>
      <div id="btndash">
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>
  </div>
