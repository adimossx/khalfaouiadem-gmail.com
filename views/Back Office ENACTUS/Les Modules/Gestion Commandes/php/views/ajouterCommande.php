<?PHP
include "../core/Commandes.php";
//include "../Gestion Produit/php/core/Produits.php";
session_start();
if (isset($_SESSION["login_in"])) {
    if (!empty($_SESSION["ID"])) {
        $id=$_SESSION["ID"];
        $sql="SELECT * from admin where ID='$id' ";
		$db = config2::getConnexion();
        $currentUSER=$db->query($sql);

        $Commandes=new Commandes();
        $listeCommandes=$Commandes->afficherCommandess();

//var_dump($listeEmployes->fetchAll());
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajouter Commande</title>
    <meta name="description" content="Ajouter Produits">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../../../../images/enactus-png.png">
    <link rel="shortcut icon" href="../../../../images/enactus-png.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../../../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />


    <script src="../../Ajs.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <link href="AfficherProduitCss.css" rel="stylesheet" />

    <!--
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
        <script src="ImageJS.js"></script>-->

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
    <script src="../../ImageJS.js"> </script>
    <script src="../../fahdscript.js"></script>
</head>



<body>

<!--left-panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-item-has-children dropdown">
                    <a class="dropdown-toggle" href="../../../../index.html"><i class="menu-icon fa fa-laptop" ></i>Dashboard </a>
                </li>
                
                <?php if($_SESSION["ID"] == "superUser")
                                {?>

                            <li class="menu-title">Super Admin</li><!-- /.menu-title -->
                            <li class="menu-item-has-children dropdown" >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Gestion Admins</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li  ><i class="menu-icon fa fa-eye" ></i><a href="../../../Gestion Admins/CAdmins.php">Consulter et Ajouter</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Gestion Projets</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../../../Gestion Projets/CProjets.php">Consulter et Ajouter</a></li>
                                </ul>
                            </li>

                            <!-- Amine Module -->
                            <li class="dropdown"> 
                                <a href="../../../Marketing - Newsletter/views/CMarketing-Newsletter.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-envelope"></i>Gestion Newsletters</a>
                            </li>
                            
                            <li class="dropdown"> 
                                <a href="../../../Markenting - ListeContact/views/CMarketing-ListeContact.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Listes de Diffusions</a>
                            </li>

                            <li class="dropdown"> 
                                <a href="../../../Markenting - Banniere/views/CMarketing-Banniere.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Gestion des Bannieres</a>
                            </li>
                            <!-- Fin Amine Module -->

                            <!-- Ahmed Module -->
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Gestion des Fournisseurs</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../../../Gestion Fournisseur/views/afficherSociete.php">Consulter Societe</a></li>
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../../../Gestion Fournisseur/views/afficherPersonne.php">Consulter Personne</a></li>
                                    <li><i class="menu-icon fa fa-plus-circle"></i><a href="../Gestion Fournisseur/views/AFournisseur.html">Ajouter</a></li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Les Livraisons</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../../../Gestion Livraisons/views/afficherLivraison.php">Consulter</a></li>
                                </ul>
                            </li>
                            <!-- Fin Ahmed Module -->

                            <?php } ?>

                            <li class="menu-title">Gestions</li><!-- /.menu-title -->

                            <!-- Fahd Module -->
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-bell"></i>Produits</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../../../gestion produit/php/views/afficherProduit.php">Consulter</a></li>
                                    <li><i class="menu-icon fa fa-plus-circle"></i><a href="../../../gestion produit/php/views/ajouterProduit.php">Ajouter</a></li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children dropdown" >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Commandes</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../../../Gestion Commandes/php/views/afficherCommande.php">Consulter</a></li>
                                    <li><i class="menu-icon fa fa-plus-circle"></i><a href="../../../Gestion Commandes/php/views/ajouterCommande.php">Ajouter</a></li>
                                </ul>
                            </li>

                            <!-- Fin Fahd Module -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-smile-o"></i>Clients</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-eye"></i><a href="#">Consulter</a></li>
                        <li><i class="menu-icon fa fa-plus-circle"></i><a href="#">Ajouter</a></li>
                        <li><i class="menu-icon fa fa-pencil-square-o"></i><a href="#">Modifier</a></li>
                        <li><i class="menu-icon fa  fa-eraser"></i><a href="#">Supprimer</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-thumbs-o-up"></i>Avis</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-eye"></i><a href="../../../Gestion Avis/CAvis.html">Consulter</a></li>
                        <li><i class="menu-icon fa fa-plus-circle"></i><a href="../../../Gestion Avis/AAvis.html">Ajouter</a></li>
                        <li><i class="menu-icon fa fa-pencil-square-o"></i><a href="../../../Gestion Avis/MAvis.html">Modifier</a></li>
                        <li><i class="menu-icon fa  fa-eraser"></i><a href="../../../Gestion Avis/SAvis.html">Supprimer</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-credit-card"></i>Réclamations</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-eye"></i><a href="../../../Gestion Reclamations/CReclamation.html">Consulter</a></li>
                        <li><i class="menu-icon fa fa-plus-circle"></i><a href="../../../Gestion Reclamations/AReclamation.html">Ajouter</a></li>
                        <li><i class="menu-icon fa fa-pencil-square-o"></i><a href="../../../Gestion Reclamations/MReclamation.html">Modifier</a></li>
                        <li><i class="menu-icon fa  fa-eraser"></i><a href="../../../Gestion Reclamations/SReclamation.html">Supprimer</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-heart"></i>Recommandation </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-eye"></i><a href="../../../Recommandation/CRecommandation.html">Consulter</a></li>
                        <li><i class="menu-icon fa fa-plus-circle"></i><a href="../../../Recommandation/ARecommandation.html">Ajouter</a></li>
                        <li><i class="menu-icon fa fa-pencil-square-o"></i><a href="../../../Recommandation/MRecommandation.html">Modifier</a></li>
                        <li><i class="menu-icon fa  fa-eraser"></i><a href="../../../Recommandation/SRecommandation.html">Supprimer</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Marketing</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-eye"></i><a href="../../../Marketing/CMarkiting.html">Consulter</a></li>
                        <li><i class="menu-icon fa fa-plus-circle"></i><a href="../../../Marketing/AMarkiting.html">Ajouter</a></li>
                        <li><i class="menu-icon fa fa-pencil-square-o"></i><a href="../../../Marketing/MMarkiting.html">Modifier</a></li>
                        <li><i class="menu-icon fa  fa-eraser"></i><a href="../../../Marketing/SMarkiting.html">Supprimer</a></li>
                    </ul>
                </li>


                <li class="menu-title">Paramètres</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gear "></i>Configuration</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-gears"></i><a href="#">Profil</a></li>
                        <li><i class="menu-icon fa fa-sign-out"></i><a href="#">Déconnection</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header logo">
                <a class="navbar-brand" href="./"><img  src="../../../../images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="../../../../images/logo2.png" alt="Logo"></a>
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>

                    <div class="dropdown for-notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">3</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown for-message">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-envelope"></i>
                            <span class="count bg-primary">4</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media" href="#">
                                <span class="photo media-left"><img alt="avatar" src="../../../../images/avatar/1.jpg"></span>
                                <div class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                    <p>Hello, this is an example msg</p>
                                </div>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <span class="photo media-left"><img alt="avatar" src="../../../../images/avatar/2.jpg"></span>
                                <div class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </div>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <span class="photo media-left"><img alt="avatar" src="../../../../images/avatar/3.jpg"></span>
                                <div class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                    <p>Hello, this is an example msg</p>
                                </div>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <span class="photo media-left"><img alt="avatar" src="../../../../images/avatar/4.jpg"></span>
                                <div class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <?php
                            foreach($currentUSER as $row){

                            ?>
                            <div class="user-area dropdown float-right">
                                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="user-avatar rounded-circle" src="../../../../Les Modules/Gestion Admins/<?PHP echo $row['image'];?>" alt="User Avatar">
                                    </a>

                                    <div class="user-menu dropdown-menu">
                                        <a class="nav-link" href="#"><i class="fa fa- user"></i>
                                            <?PHP echo $row['pseudo']; ?></a>
                                        <a class="nav-link" href="../../../Gestion Admins/login/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
    <!-- /#header -->
    <!-- content -->
    <style>
        .ErrFah{
            font-size: 15px ;
            color: red;
        }
    </style>
    <div class="content">
        <!-- EKTOB HOUNI -->

        <div class="row">
            <!-- ============================================================== -->
            <!-- valifation types -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header" style="font-weight : bolder">Ajout Commande</h5>
                    <div class="card-body">
                        <form method="POST" id="validationform" data-parsley-validate="" novalidate=""  action="../../../Gestion%20Commandes/php/views/ajoutCommande.php"> <!-- HIGHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH-->
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Référence</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" id="Reftext" name="reference"   placeholder="Ref.." class="form-control" > <!-- RefVerif(this.id,'textRef')-->
                                    <input type="hidden" class="CHECK" required="" id="Reftext_ck">
                                </div>
                                <p id="textRef" class="ErrFah"></p>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Nom Client</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" id="Nomtext"  name="nom_client" data-parsley-minlength="6"  placeholder="" class="form-control" >
                                    <input type="hidden" class="CHECK" required="" id="Nomtext_ck">
                                </div>
                                <p id="textNom" class="ErrFah"></p>
                            </div>
                            <!--                -->
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Nouveau Client</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="hidden" class="CHECK" required="" id="Cattext_ck">
                                    <select name="type_client"  data-parsley-length="[5,10]" placeholder="" class="form-control" id="tax" onchange="CalculTax('taxtext','Prixtext',this.id,'P_ck')">
                                        <option value="" disabled selected>Oui/Non</option>
                                        <option value="Oui">Oui</option>
                                        <option value="Non">Non</option>
                                    </select>
                                </div>
                                <p id="textcat" class="ErrFah"></p>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" id="PrixTTCtext" >Prix total</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" id="Prixtext"  name="prix_total" data-parsley-maxlength="6"  value="0" placeholder="" class="form-control" onblur="FloatVerif(this.id,'textPrix','Prixtext_ck')">
                                    <input type="hidden" class="CHECK" required="" id="Prixtext_ck">
                                </div>
                                <p id="textPrix" class="ErrFah"></p>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Paiment</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="paiment"  data-parsley-length="[5,10]" placeholder="" class="form-control" id="tax" onchange="CalculTax('taxtext','Prixtext',this.id,'P_ck')">
                                        <option value="" disabled selected>Type paiment</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="espece">espece</option>
                                        <option value="virement bancaire">virement bancaire</option>
                                    </select>
                                </div>
                                <input type="hidden" class="CHECK" required="" id="P_ck">
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Etat</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" id="Qutext"  name="etat" data-parsley-min="6" placeholder="" class="form-control" value="Nouvelle Commande">
                                    <input type="hidden" class="CHECK" required="" id="Quantitetext_ck">
                                </div>
                                <p id="textquantite" class="ErrFah"></p>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Date D'ajout</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="date" id="ddate" name="date" data-parsley-min="6" placeholder="" class="form-control" value="<?php echo date('Y-m-d'); ?>" > <!-- -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Description</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea  class="form-control" name="description" style="height: 250px"></textarea>
                                </div>
                            </div>

                            <!-- -->

                            <!-- -->
                            <div class="form-group row text-right">
                                <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                    <button type="submit" id="Ssubmit" class="btn btn-space btn-primary" name="ajouter" value="ajouter">Submit</button>
                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2019 Taha Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a>WASP</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#content -->



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../../../../assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="../../../../assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="../../../../assets/js/init/fullcalendar-init.js"></script>

</body>
</html>
<?php }
        else{
            echo "NOP1";
        }
    }
    else
    {
        echo "NOPeeeee";
    }
    ?>