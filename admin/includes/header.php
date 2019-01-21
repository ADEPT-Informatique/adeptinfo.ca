<?php 
$path = $_SERVER['DOCUMENT_ROOT']."/admin";
require_once($path."/model/bd_connexion.php");

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ADEPT Informatique</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link href="/admin/img/favicon.png" rel="icon">
    <link href="/admin/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="/admin/node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="/admin/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/admin/node_modules/animate.css/animate.min.css" rel="stylesheet">
    
    <!--    <link href="node_modules/ionicons/dist/css/ionicons.min.css" rel="stylesheet">-->
    <link href="/admin/node_modules/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/admin/node_modules/lightbox2/dist/css/lightbox.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="/admin/styles/style.css" rel="stylesheet">
    <link href="/admin/styles/hoodie.css" rel="stylesheet">

</head>

<body>

    <!--==========================
	HEADER
  ============================-->
    <header id="header">
        <div class="container-fluid">
            <div id="logo" class="pull-left">
                <h1><a href="index.php" class="scrollto">ADEPT</a></h1>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active d-block d-sm-none"><a href="index.php">Accueil</a></li>
                    <li><a href="view/login.php">Dashboard a partir de l'index</a></li>
                    <li><a href="../view/login.php">Dashboard a partir l'iterface d'articles</a></li>
                </ul>
            </nav>
        </div>
    </header>