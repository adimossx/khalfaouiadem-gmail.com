<?PHP

include "../core/Categories.php";
$Categories=new Categories();
$Projets= new Projets();
$result=$Categories->afficherCategoriess();
$result2=$Projets->afficherProjetss();
$result3=$Categories->List_Produits();

session_start();
if (isset($_SESSION["login_in"])) {
if (!empty($_SESSION["ID"])) {
$id=$_SESSION["ID"];
$sql="SELECT * from admin where ID='$id' ";
$db = config2::getConnexion();
$currentUSER=$db->query($sql);
//var_dump($listeEmployes->fetchAll());
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajouter Produits</title>
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


    <!--<script src="../../Ajj.js"></script>-->

    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <link href="AfficherProduitCss.css" rel="stylesheet" />

    <!--
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
        <script src="ImageJS.js"></script>-->

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    <script src="../../ImageJS.js"> </script>
    <!--<script src="../../fahdscript.js"></script>-->
</head>



<body>

<!--left-panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-item-has-children dropdown">
                    <a class="dropdown-toggle" href="../../../../index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
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
                            <li><i class="menu-icon fa fa-plus-circle"></i><a href="../../../Gestion Fournisseur/views/AFournisseur.html">Ajouter</a></li>
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
                <li class="menu-item-has-children dropdown" style="background: #ffbe27;position: relative;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-bell"></i>Produits</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-eye"></i><a href="../../../gestion produit/php/views/afficherProduit.php">Consulter</a></li>
                        <li><i class="menu-icon fa fa-plus-circle"></i><a href="../../../gestion produit/php/views/ajouterProduit.php">Ajouter</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown"  >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Commandes</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-eye"></i><a href="../../../Gestion Commandes/php/views/afficherCommande.php">Consulter</a></li>
                        <!--<li><i class="menu-icon fa fa-plus-circle"></i><a href="../../../Gestion Commandes/php/views/ajouterCommande.php">Ajouter</a></li>-->
                    </ul>
                </li>

                <!-- Fin Fahd Module -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-smile-o"></i>Points Fidélités</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-user-circle"></i><a href="../../../Gestion%20Point%20Fidelite/PointsClients/views/Consulter-PointsClients.php">Points Clients</a></li>
                        <li><i class="menu-icon fa fa-gift"></i><a href="../../../Gestion%20Point%20Fidelite/PointsProduits/views/CMarketing-PointsProduits.php">Points Produits</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-reply"></i>Demande Retour</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-eye"></i><a href="../../../Gestion%20Demande/view/afficher_demande_super_admin.php">Afficher SuperAdmin</a></li>
                        <li><i class="menu-icon fa fa-bullseye"></i><a href="../../../Gestion%20Demande/view/afficher_demande.php">Afficher Admin</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-credit-card"></i>Réclamations</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-eye"></i><a href="../../../Gestion%20Reclamations/view/afficher_reclamation_super_admin.php">Afficher SuperAdmin</a></li>
                        <li><i class="menu-icon fa fa-bullseye"></i><a href="../../../Gestion%20Reclamations/view/afficher_reclamation.php">Afficher Admin</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-heart"></i>Recommandation </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-eye"></i><a href="../../../Gestion%20Recommandations/Recommandation/views/afficher_recommandation.php">Consulter</a></li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
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
                        $projet_admin= $row['IDP'];
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
    </header>
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
                    <h5 class="card-header" style="font-weight : bolder">Ajout produit</h5>
                    <div class="card-body">
                        <form method="POST" id="validationform" data-parsley-validate="" novalidate=""  action="../../../Gestion%20Produit/php/views/ajoutProduit.php"> <!-- HIGHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH-->
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Référence</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" id="Reftext" name="reference"   placeholder="Ref.." class="form-control" onblur="RefVerif(this.id,'textRef','Reftext_ck')"> <!-- RefVerif(this.id,'textRef')-->
                                    <input type="hidden" class="CHECK" required="" id="Reftext_ck">
                                </div>
                                <p id="textRef" class="ErrFah"></p>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Nom</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" id="Nomtext"  name="nom" data-parsley-minlength="6"  placeholder="" class="form-control" onblur="CheckInfoLettre(this.id,'textNom','Nomtext_ck')">
                                    <input type="hidden" class="CHECK" required="" id="Nomtext_ck">
                                </div>
                                <p id="textNom" class="ErrFah"></p>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >ID Projet</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="hidden" id="Ree_check" value="false" class="CHECK">
                                    <select name="id_projet" data-parsley-length="[5,10]"  class="form-control" id="id_projets" onchange="fahd()">
                                        <option disabled selected>ID projet</option>
                                            <script>
                                                var dive = '<option value="<?PHP echo $projet_admin; ?>"><?PHP echo $projet_admin; ?></option>';
                                                $('#id_projets').append(dive);
                                            </script>
                                    </select>
                                </div>
                                <input type="hidden" id="Id_projet_ck">
                            </div>

                            <!--                -->
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Catégorie</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" list="id_categorie" id="cattext" name="categorie"  data-parsley-minlength="6"  placeholder=""  class="form-control" onblur="CheckInfoLettrec(this.id,'textcat','Cattext_ck')">
                                    <input type="hidden" class="CHECK" required="" id="Cattext_ck">
                                    <datalist id="id_categorie">
                                        <?PHP
                                        foreach($result as $row) {
                                            ?>
                                            <script>
                                                    var valu = "<?PHP echo $row['nom']; ?>" ;
                                                  //  alert(valu);
                                                    var dive = '<option value="<?PHP echo $row['nom']; ?>"> </option>';
                                                    $('#id_categorie').append(dive);
                                            </script>
                                            <?PHP
                                        }
                                        ?>
                                    </datalist>
                                </div>
                                <p id="textcat" class="ErrFah"></p>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" id="PrixTTCtext" >Prix-HT</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" id="Prixtext"  name="prixHT" data-parsley-maxlength="6"  value="0" placeholder="" class="form-control" onblur="FloatVerif(this.id,'textPrix','Prixtext_ck')">
                                    <input type="hidden" class="CHECK" required="" id="Prixtext_ck">
                                </div>
                                <p id="textPrix" class="ErrFah"></p>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Taux du taxe</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select type="text"  data-parsley-length="[5,10]" placeholder="" class="form-control" id="tax" onchange="CalculTax('taxtext','Prixtext',this.id,'P_ck')">
                                        <option value="" disabled selected>Taxe</option>
                                        <option value="18">18%</option>
                                        <option value="20">20%</option>
                                    </select>
                                </div>
                                <input type="hidden" class="CHECK" required="" id="P_ck">
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Prix</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text"  data-parsley-min="6" name="prix" placeholder="" class="form-control" id="taxtext" onblur="FloatVerif(this.id,'textPr','PRtext_ck')" >
                                    <input type="hidden" class="CHECK" required="" id="PRtext_ck">
                                </div>
                                <p id="textPr" class="ErrFah"></p>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Quantité</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" id="Qutext"  name="quantite" data-parsley-min="6" placeholder="" class="form-control" onblur="VerifQuantite(this.id,'textquantite','Quantitetext_ck')">
                                    <input type="hidden" class="CHECK" required="" id="Quantitetext_ck">
                                </div>
                                <p id="textquantite" class="ErrFah"></p>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Date D'ajout</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="date" id="ddate" name="date" data-parsley-min="6" placeholder="" class="form-control" value="<?php echo date('Y-m-d'); ?>" onkeydown="date_chk(this)" readonly> <!-- -->
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
                                    <button type="button" id="Ssubmit" class="btn btn-space btn-primary" name="ajouter" value="ajouter">Submit</button>
                                    <a class="btn btn-space btn-secondary" href="afficherProduit.php">Cancel</a>
                                </div>
                            </div>

                        </form>
                        <!--<div class="container">
                            <br />
                            <br />
                            <form action="../Gestion%20Produit/upload.php" class="dropzone" id="dropzoneFrom" method="POST">
                                <input type="hidden" id="Re" name="Refim" value="aloo">
                                <div align="center">
                                    <button type="submit" class="btn btn-info" id="submit-all" onclick="fahd2()" >Upload</button>
                                    <p id="ff"></p>
                                </div>
                            </form>
                            <br />
                            <br />

                            <br />
                            <br />
                            <div id="preview"></div>
                            <br />
                            <br />
                        </div>-->
                        <div class="container">
                            <br />
                            <!--<h3 align="center">How to Upload a File using Dropzone.js with PHP</h3>-->
                            <br />
                            <form action="upload.php" class="dropzone" id="dropzoneFrom" method="POST">
                                <!-- action="../Gestion%20Produit/upload.php"  -->
                                <input type="hidden" id="Re" name="Refim"  >
                                <input type="hidden"  id="Ree" name="Idpim"  >
                                <div align="center">
                                    <button type="submit" class="btn btn-space btn-primary" id="submit-all" onclick="return fahd2()">Upload</button>
                                    <p id="ff"></p>
                                </div>
                            </form>
                            <br />
                            <br />

                            <br />
                            <br />
                            <div id="preview"></div>
                            <br />
                            <br />
                        </div>
                    </div>

                </div>

                <!-- ============================================================== -->
                <!-- end valifation types -->
                <!-- ============================================================== -->
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
    echo "NOP1z";
    //header("location : ../../../../Les Modules/Gestion Admins/login/page-login.php");

}
}
else
{
    //echo "../../../../../Back Office ENACTUS/Les Modules/Gestion Admins/login/page-login.php";
    //header("location : Back Office ENACTUS/Les Modules/Gestion Admins/login/page-login.php");
   // header("location :Back Office ENACTUS/Les Modules/Gestion Admins/login/page-login.php");
    header("Location:../../../../../Back Office ENACTUS/Les Modules/Gestion Admins/login/page-login.php");
//include "../../../../../Back Office ENACTUS/Les Modules/Gestion Admins/login/page-login.php";
}
?>

<script>
   /* $(document).ready(function(){
        TodayDate('ddate');
    });*/
        $('#Ssubmit').click(function () {
var i=0;
var error = false ;
var checke ='';

        jQuery.each($('.CHECK'), function() {
            i++;
            checke = $(this).val();
            //alert(checke+i);
            if( checke !== "true"){
               // alert('buton');
                error = true ;
                var button = $('#Ssubmit');
                button.prop('type','button');
            }
            /*if(!error){
                alert('submit');
                button.prop('type', 'submit');
            }*/
        });
        if (!error)
        {
            //alert('submit');
            var button = $('#Ssubmit');
            button.prop('type', 'submit');
        }
    });
   /* function CheckRequired() {
        alert('11');
        $('.required').each(function () {
            alert('22');
        });
    }*/
   /* $(document).ready(function(){

        $(document).on('click', '.column_sort', function(){
            //$('#1234').append('<div >fahd</div>');
            var arroww = '<div class="ps-sortable-column" data-sort-is-current="true" data-sort-direction="asc">fahd<span role="button" class="ps-sort" aria-label="Tri" ></span>';

            var column_name = $(this).attr("id");
            var order = $(this).data("order");
            var arrow = '';
            var arrowe ='<span role="button" class="ps-sort" aria-label="Tri" >';
            $.ajax({
                url:"sort.php",
                method:"POST",
                data:{column_name:column_name, order:order},
                success:function(data)
                {
                    // $('#1234').append('<div >fahd</div>');
                    $('#employee_table').html(data);
                    $('#'+column_name+'').append(arrow);
                    var ids = ["id", "reference", "nom", "categorie","quantite","prix","date"];
                    var i = 0;
                    for (;ids[i];) {
                        if (ids[i] != column_name)
                            $('#'+ids[i]+'').append(arrowe);
                        i++;
                    }
                }
            })
        });

    });*/
  /* $(document).on('click', '#Ssubmit', function(){
       alert('1');
       $('.CHECK').each(function() {
           alert('33');
           var $this = $(this);
           if ($this.text() == '') {
               //$this.width(510);
           } else {
               // $this.width(20);
           }
       })​

       Fahhhd();
       alert('2');
   });*/

   /*function Fahhhd() {
       alert('12');

   }*/
   /*function CheckRequired() {
       var ret = true;
    alert('11');
       $('.required').each(function () {
           alert('22');
           var check = $(this).val();

           if (check == '') {
               //alert($(this).attr("id"));
               //event.preventDefault();
           }
       });

       if (!ret) {
           alert("One or more fields cannot be blank");
           //event.preventDefault();
       }
   }*/
   /*function check_required_inputs() {
       alert('function');
       $('.required').each(function(){
           alert('req');
           if( $(this).val() == "false" ){
               alert('Please fill all the fields');
               var button = $('#Ssubmit');
               button.prop('type','button');
               var error = true;
               if(!error){
                   button.prop('type', 'submit');
                   alert('Jq');
               }
           }
       });
   };
*/
   /*$(document).on('click', '#Ssubmit', function(){
       alert('1');
       CheckRequired();
       alert('2');
   });*/
    </script>

<script>
    function fahd2() {
       // var fahd =document.getElementById('Reftext').value ;
       // fahd = 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
       // var fahed ='Projet2';
       // var datastring ='namee='+ fahd;
        //var datastringe ='idde='+ fahed;
        $.ajax({
            type:"post",
            url:"upload.php",
            //data:datastring,
            //date:{iddee:fahed},
            //data: {nomee:fahed,datastring:fahd},
            //cache:false,
            //success:function (html) {
               // $('#Re').html(html);
                //$('#Ree').html(html);
            //}
        });
        return false;
    }
    function fahd() {

        document.getElementById("Ree").value = document.getElementById('id_projets').value;
        document.getElementById('Ree_check').value='true';
        //alert(document.getElementById('id_projets').value);
        //alert(document.getElementById("Ree").value);
        //document.getElementById("dropzoneFrom").submit() ;
    }

    /* $(function() {
         $('#dropzoneFrom').on('submit', function(e) {
             var data = $("#dropzoneFrom :input").serialize();
             $.ajax({
                 type: "POST",
                 url: "script.php",
                 data: data,
             });
             e.preventDefault();
         });
     });*/


    /*function fahd {
        //$ref = document.getElementById('Reftext').value ;
        document.getElementById("Re").value = document.getElementById('Reftext').value;
    }*/
    $(document).ready(function(){

        Dropzone.options.dropzoneFrom = {
            autoProcessQueue: false,
            acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
            init: function(){
                var submitButton = document.querySelector('#submit-all');
                myDropzone = this;
                submitButton.addEventListener("click", function(){
                    myDropzone.processQueue();
                });
                this.on("complete", function(){
                    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                    {
                        var _this = this;
                        _this.removeAllFiles();
                    }

                    //list_image(); // mouch héthi doub mayo5el lel page
                    list_image(); //
                });
            },
        };

        //list_image();
        list_image();

        function list_image()
        {   var fah =$('#Reftext').val();
            var fahh =$('#id_projets').val();
            //$.post('upload.php',{postref:fah},function (data) {$('#result').html(data)});
            $.ajax({
                url:"upload.php",
                method:"POST",
                data: {nome:fah,nomee:fahh},
                success:function(data){
                    $('#preview').html(data);
                }
            });

        }

        $(document).on('click', '.remove_image', function(){
            var name = $(this).attr('id');
            var fah =$('#Re').val();
            var fahh =$('#id_projets').val();
            $.ajax({
                url:"upload.php",
                method:"POST",
                data:{name:name,nome:fah,nomee:fahh},
                success:function(data)
                {
                    list_image(); // mouch héthi doub mayo5el lel page
                    list_image();

                }
            })
        });

    });
</script>
<script>

    function RefVerif(s1,s2,s3) {
       // <?php //$test=?>'ref';
       // <?php//$n=0;foreach ($result3 as $ket) {$n++;};?>
       // alert(<?//php echo $n;?>);
        var regex = /^[a-zA-Z0-9]*$/;
        var data=document.getElementById(s1) ;
        var datar = data.value.substring(0,1);
        var datanr =data.value.substring(1,data.value.length);

        if ( !regex.test(data.value) || data.value.length<3) {
            data.style.border = "1px solid #FF0000";
            document.getElementById(s2).innerHTML="*Referance invalide";
            document.getElementById(s3).value="false";
        }
        else {data.style.border = "";
            document.getElementById(s2).innerHTML="";
            document.getElementById(s3).value="true";
        }
        document.getElementById("Re").value = document.getElementById('Reftext').value;

    }
    function CheckInfoLettre(s1,s2,s3)
    {   var data=document.getElementById(s1) ;
        var regex = /^[a-zA-Z ]{3,30}$/;
        if(!regex.test(data.value) || data.value== "")
        {
            data.style.border = "1px solid #FF0000";
            document.getElementById(s2).innerHTML="*Nom invalide";
            document.getElementById(s3).value="false";

            return false;
        }
        else
        {
            data.style.border = "";
            document.getElementById(s2).innerHTML="";
            document.getElementById(s3).value="true";

            return true;
        }
    }

    function CheckInfoLettrec(s1,s2,s3)
    {   var data=document.getElementById(s1) ;
        var regex = /^[a-zA-Z ]{3,30}$/;
        if(!regex.test(data.value) || data.value== "")
        {
            data.style.border = "1px solid #FF0000";
            document.getElementById(s2).innerHTML="*Categorie invalide";
            document.getElementById(s3).value="false";

            return false;
        }
        else
        {
            data.style.border = "";
            document.getElementById(s2).innerHTML="";
            document.getElementById(s3).value="true";

            return true;
        }
    }

    function FloatVerif(s1,s2,s3) {

        var data = document.getElementById(s1);
        var datanr =data.value.substring(0,1);

        //alert(datanr);
        //data.value="0";
        var regex = /^-?\d*(\.\d+)?$/;
        // var datan = data.value.substring(data.value.indexOf("."),data.value.length) ;

        if (!regex.test(data.value) || data.value == "" || datanr == "-" ) {
            data.style.border = "1px solid #FF0000";
            document.getElementById(s2).innerHTML = "*Prix invalide";
            document.getElementById(s3).value="false";

            return false;
        } else {
            data.style.border = "";
            document.getElementById(s2).innerHTML = "";
            document.getElementById(s3).value="true";

            return true;
        }

    }
    function CalculTax(s1,s2,s3,s4) {

        var data1=document.getElementById(s2).value;
        var data2=document.getElementById(s3).value;
        document.getElementById(s4).value="true";
        document.getElementById('PRtext_ck').value="true";

        document.getElementById(s1).value=((data2*data1*0.01)+Number(data1));
    }
    function VerifQuantite(s1,s2,s3) {
        var data=document.getElementById(s1);
        var regex =/^[1-9][0-9]?$|^100$/ ;

        if (!regex.test(data.value) || data.value == "" ) {
            data.style.border = "1px solid #FF0000";
            document.getElementById(s2).innerHTML = "*Verifier la quantité";
            document.getElementById(s3).value="false";

            return false;
        } else {
            data.style.border = "";
            document.getElementById(s2).innerHTML = "";
            document.getElementById(s3).value="true";

            return true;
        }
    }
    function TodayDate(s1) {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        today = mm + '/' + dd + '/' + yyyy;
        document.getElementById(s1).value=today;
    }
    function date_chk(s1) {
        alert(document.getElementById(s1).value);
    }
    /*
    function check_required_inputs() {
        $('.required').each(function(){
            if( $(this).val() == "false" ){
                var button = $('#Ssubmit');
                button.prop('type','button');
                var error = true;
            }
            if(!error){
                button.prop('type', 'submit');
            }
        });
    });*/
    </script>