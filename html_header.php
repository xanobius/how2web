<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
    <title>how2web - <?php if(isset($title))echo $title; ?></title>
    <?php
    if(isset($redirect_to)){
    ?>
        <META http-equiv="refresh" content="3;URL=<?php echo $redirect_to; ?>">
    <?php
    }
    ?>
</head>
<body>
