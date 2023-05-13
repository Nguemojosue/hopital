    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.php">
                                        <!-- <img src="img/logo.png" alt=""> -->
                                        <div class="logoBulleContour"><div class="logoBulle"><i class="fa fa-briefcase"></i></div></div>
                                        <div class="nomlogo-group">
                                            <div class="nomLogo">Stagio</div>
                                            <div class="slogan">Recherche, postule et work</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="index.php" class="<?php if(empty($_GET['page'])){echo 'active';} ?>">Accueil</a></li>
                                            <li><a href="jobs.php?page=jobs" class="<?php if(!empty($_GET['page']) AND $_GET['page'] == 'jobs'){echo 'active';} ?>">Emplois</a></li>
                                            <li><a href="#" class="<?php if(!empty($_GET['page']) AND $_GET['page'] == 'stage'){echo 'active';} ?>">Stages <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="stage.php?page=stage&type=academique" class="<?php if(!empty($_GET['page']) AND $_GET['page'] == 'stage' AND !empty($_GET['type']) AND $_GET['type'] == 'academique'){echo 'active';} ?>">Academique </a></li>
                                                    <li><a href="stage.php?page=stage&type=professionnel" class="<?php if(!empty($_GET['page']) AND $_GET['page'] == 'stage' AND !empty($_GET['type']) AND $_GET['type'] == 'professionnel'){echo 'active';} ?>">Professionnel </a></li>
                                                    <!-- <li><a href="elements.html">elements</a></li> -->
                                                </ul>
                                            </li>
                                             <li><a href="formations.php?page=formations" class="<?php if(!empty($_GET['page']) AND $_GET['page'] == 'formations'){echo 'active';} ?>">Formations</a></li>
                                            <li><a href="contact.php?page=contact" class="<?php if(!empty($_GET['page']) AND $_GET['page'] == 'contact'){echo 'active';} ?>">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="connexion.php?page=connexion" class="con <?php if(!empty($_GET['page']) AND $_GET['page'] == 'connexion'){echo 'active';} ?>">Connexion</a>
                                    </div>
                                    <div class="d-none d-lg-block">
                                        <a class="boxed-btn3" href="postcv.php?page=post">Envoyer votre CV</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>