<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title> <?= $title ?> </title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>about"> About </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>posts"> Posts  </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>posts/create"> New Posts  </a>
    </li>

    </ul>
  
  </div>
</nav>

<div class="container">
