<?php 
require_once("admin/model/bd_articles.php");
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
                                                <th scope="col">Image</th>
                                                <th scope="col">Article</th>
                                                <th scope="col">Prix</th>
                                                <th scope="col">Inventaire</th>
                                                <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $tabAllArticles = getAllArticles();
                                        foreach ($tabAllArticles as $Article)
                                    { ?>
                                    <tr class="clickable" data-toggle="collapse" id="row<?php echo $Article['articleID'];?>" data-target=".row<?php echo $Article['articleID'];?>">
                                                <td >
                                                    <img height="100" width="100" src="<?php echo "../../img/epicerie/".$Article['articleID'].".jpg"; ?>" />
                                                </td>
                                                <td >
                                                    <?php echo $Article['nom']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Article['cout']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Article['qtyCourant']; ?>
                                                </td>
                                                <td >
                                                    <?php echo $Article['info']; ?>
                                                </td>
                                            </tr><!--
                                            <tr class="collapse row<?php echo $Article['articleID'];?>">
                                                <form method="post" action="../controller/ArticleEdit.php">
                                                    <td >
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="customFile">IMG</label>
                                                            <input type="file" class="custom-file-input" style="width:2rem;" id="file" name="file">
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <input type="hidden" value="<?php echo $Article['articleID']?>" name="id" class="form-control" id="id" />
                                                        <input type="text" value="<?php echo $Article['nom']?>" name="nom" class="form-control" id="nom" />
                                                    </td>
                                                    <td>
                                                    <input type="number" value="<?php echo $Article['cout']?>" name="cout" class="form-control" id="cout" step=".01"/>
                                                    </td>
                                                    <td>
                                                    <input type="number" value="<?php echo $Article['qtyCourant']?>" name="qty" class="form-control" id="qty"  />
                                                    </td>
                                                    <td >
                                                    <input type="text" value="<?php echo $Article['info']?>" name="desc" class="form-control" id="desc"  />
                                                    </td>
                                                    <td >
                                                        <input class="btn btn-primary" type="submit" name="submit" value="Modifier"/><br><br>
                                                    </td>
                                                </form>
                                            </tr>-->
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