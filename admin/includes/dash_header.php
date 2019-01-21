<!-- /**
 * header.php
 * Created by Olivier Brassard on 10-08-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */ -->



<!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="../index.php">
                            <img src="../img/dash/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Accueil</a>
                        </li>
                        <li>
                            <a href="../view/frmAddArticle.php">
                                <i class="fas fa-shopping-basket"></i>Epicerie
                            </a>
                        </li>
                        <li>
                            <a href="../view/userList.php">
                                <i class="fas fa-shopping-basket"></i>Epicerie
                            </a>
                        </li>
                        <li>
                            <a href="../hoodies/index.php">
                                <i class="fas fa-tshirt"></i>Gestion hoodies</a>
                        </li>
                        <li>
                            <a href="../membres-confiance/index.php">
                                <i class="fas fa-certificate"></i>Membres de confiance</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="far fa-gamepad"></i>Comité du LAN</a>
                        </li>

                        <li>
                            <a href="../admins/index.php">
                                <i class="fas fa-id-badge"></i>Administrateurs</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fas fa-cogs"></i>Paramètres du site</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fas fa-external-link-alt"></i>Gestion du LAN</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo text-center">
                <a href="../../index.php" class="text-center">
                    <img src="../img/badge.png" alt="ADEPT INFORMATIQUE" width="70"/>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Accueil</a>
                        </li>
                        <li>
                            <a href="../view/frmAddArticle.php">
                                <i class="fas fa-shopping-basket"></i>Epicerie
                            </a>
                        </li>
                        <li>
                            <a href="../view/UserList.php">
                                <i class="fas fa-shopping-basket"></i>Liste Utilisateurs
                            </a>
                        </li>
                        <li>
                            <a href="HoodieIndex.php">
                                <i class="fas fa-tshirt"></i>Gestion hoodies</a>
                        </li>
                        <li>
                            <a href="MDCList.php">
                                <i class="fas fa-certificate"></i>Membres de confiance</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="far fa-gamepad"></i>Comité du LAN</a>
                        </li>

                        <li>
                            <a href="AdminList.php">
                                <i class="fas fa-id-badge"></i>Administrateurs</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fas fa-cogs"></i>Paramètres du site</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fas fa-external-link-alt"></i>Gestion du LAN</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
<div class="page-wrapper">

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <div class="header-button">
                            <div class="account-wrap pull-right">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="../../img/users/<?php echo $userID?>.jpg" alt="" />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#"> <?php echo getInfo($userID, 'prenom').' '.getInfo($userID, 'nom') ?></a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-account"></i>Compte</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-settings"></i>Réglages</a>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="../model/bd_auth.php?action=logoff">
                                                <i class="zmdi zmdi-power"></i>Déconnexion</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER DESKTOP-->