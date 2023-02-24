<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" media="all">
  <script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">ciBlog</a>
      <div id="navbarColor01" class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto">
          <li class="nav-item"><a class="nav-link active" href="<?php echo base_url(); ?>">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>categories">Categories</a></li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item"><a href="<?php echo base_url(); ?>posts/create" class="nav-link">create post</a></li> 
          <li class="nav-item"><a href="<?php echo base_url(); ?>categories/create" class="nav-link">create category</a></li> 
          <li class="nav-item"><a href="<?php echo base_url(); ?>login" class="nav-link">login</a></li>
          <li class="nav-item"><a href="<?php echo base_url(); ?>register" class="nav-link">register</a></li> 
        </ul>

      </div>
    </div>
  </nav>
  <div class="container container-wrap">