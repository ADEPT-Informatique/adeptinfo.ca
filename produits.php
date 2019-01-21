<?php 
require_once("model/bd_articles.php");
include("includes/header.php");
?>

<style>
    body {
        padding-top: 90px;
    }
</style>
</head>

<body>
    <!--==========================
	                HEADER
        ============================-->
    <header id="header" style="background: black">
        <div class="container-fluid">
            <div id="logo" class="pull-left">
                <h1><a href="./index.php" class="scrollto">ADEPT</a></h1>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active d-block d-sm-none"><a href="../index.php">Accueil</a></li>
                    <li><a href="./index.php#about">Qui sommes nous</a></li>
                    <li><a href="./index.php#services">Services</a></li>
                    <li><a href="./index.php#team">Membres du conseil</a></li>
                    <li><a href="./index.php#contact">Contact</a></li>
                    <li><a href="http://adeptinfo.ca/lan">LAN de L'ADEPT</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">
            <div class="section-header text-center">
                <header class="section-header wow fadeInUp">
                    <h3>Autofinancement</h3>
                </header>
                <p class="compact">
                    Afin d'organiser des évennements comme le LAN et d'améliorer l'aménagement de notre local,
                    l'ADEPT offre à ses membres (et à tous les visiteurs) un programme d'autofinancement.

                    Nous vous offrons ainsi une vaste séléction de collations et de repas hautement gatronomiques à
                    faible coût qui respectent
                    bien entendu les recommendations du guide alimentaire canadien! Ce qui est avantageux pour vous, en
                    tant que membre, c'est
                    que tous les profits retournent directement à l'association et donc en quelques sortes à vous même
                    !
                </p>

                <p class="font-weight-bold compact">
                    Voici la liste des produits disponible à notre local (F-041)
                </p>
            </div>
            <div class="row">
                <div class="col-md" style="margin-bottom:10px">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Article</th>
                                        <th scope="col"></th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Description</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $tabAllArticles = getAllArticles();
                                        foreach ($tabAllArticles as $Article)
                                    { ?>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $Article['nom']; ?>
                                        </td>
                                        <td>
                                            <?php echo $Article['cout']; ?>
                                        </td>
                                        <td colspan="3">
                                            <?php echo $Article['info']; ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
include("includes/footer.php");
?>