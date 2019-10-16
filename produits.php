<?php
require_once("admin/model/bd_articles.php");
include("includes/header.php");
require_once("i18n/translationService.php");
$t = getTranslations();
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
        <?php include("includes/nav.php")?>
    </header>
    <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">
            <div class="section-header text-center">
                <header class="section-header wow fadeInUp">
                    <h3><?php echo $t->shop_mod->title; ?></h3>
                </header>
                <p class="compact">
                    
                    <?php echo $t->shop_mod->shop_info; ?>
                </p>

                <p class="font-weight-bold compact">
                    <?php echo $t->shop_mod->list_intro; ?>
                </p>
            </div>
            <div class="row">
                <div class="col-md" style="margin-bottom:10px">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo $t->shop_mod->image; ?></th>
                                        <th scope="col"><?php echo $t->shop_mod->article; ?></th>
                                        <th scope="col"><?php echo $t->shop_mod->price; ?></th>
                                        <th scope="col"><?php echo $t->shop_mod->inventory; ?></th>
                                        <th scope="col"><?php echo $t->shop_mod->description; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tabAllArticles = getAllArticles();
                                    foreach ($tabAllArticles as $Article) { ?>
                                        <tr class="clickable" data-toggle="collapse" id="row<?php echo $Article['articleID']; ?>" data-target=".row<?php echo $Article['articleID']; ?>">
                                            <td>
                                                <img height="100" width="100" src="<?php echo "../../img/epicerie/" . $Article['articleID'] . ".jpg"; ?>" />
                                            </td>
                                            <td>
                                                <?php echo $Article['nom']; ?>
                                            </td>
                                            <td>
                                                <?php echo $Article['cout']; ?>
                                            </td>
                                            <td>
                                                <?php echo $Article['qty']; ?>
                                            </td>
                                            <td>
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