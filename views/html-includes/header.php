<?php

require './admin/classes/Database.class.php';
require './admin/classes/Post.class.php';
require './admin/classes/Category.class.php';
require './admin/classes/SinglePost.class.php';
require './admin/classes/Message.class.php';
$singlePost = new SinglePost();
$posts = new Post();
$category = new Category();
$message = new Message();
ob_start();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="includes/node_modules/swiper/swiper-bundle.css">

    <link rel="stylesheet" href="includes/bootstrap/css/bootstrap.min.css">


    <link rel="stylesheet" href="styles.css">
</head>
<body class="gray">