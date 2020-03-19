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

<?PHP
include "../entities/Commande.php";
include "../core/Commandes.php";

session_start();
if (isset($_SESSION["login_in"])) {
if (!empty($_SESSION["ID"])) {
$id=$_SESSION["ID"];
$sql="SELECT * from admin where ID='$id' ";
$db = config2::getConnexion();
$currentUSER=$db->query($sql);


if (isset($_GET['reference'])){
    $Commandes=new Commandes();
    $result=$Commandes->recupererCommande(urldecode($_GET['reference']));
    foreach($result as $row){
        $id=$row['id'];
        $reference=$row['reference'];
        $nom_client=$row['nom_client'];
        $type_client=$row['type_client'];
        $prix_total=$row['prix_total'];
        $paiment=$row['paiment'];
        $etat=$row['etat'];
        $date=$row['date'];
        $description=$row['description'];
        ?>

        <?PHP
    }
}
if (isset($_POST['modifier'])){
    $Commande=new Commande($_POST['reference'],$_POST['nom_client'],$_POST['type_client'],$_POST['prix_total'],$_POST['paiment'],$_POST['etat'],$_POST['date'],$_POST['description']);
  //var_dump($Commande);
      $Commandes->modifierCommande($Commande,$_POST['ide']);
      header('Location: afficherCommande.php');
}
?>

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
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-bell"></i>Produits</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-eye"></i><a href="../../../gestion produit/php/views/afficherProduit.php">Consulter</a></li>
                        <li><i class="menu-icon fa fa-plus-circle"></i><a href="../../../gestion produit/php/views/ajouterProduit.php">Ajouter</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown" style="background: #ffbe27;position: relative;" >
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
                    <h5 class="card-header" style="font-weight : bolder">Modification Commande</h5>
                    <div class="card-body">
                        <form method="POST" id="validationform" data-parsley-validate="" novalidate="" > <!-- HIGHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH-->
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Référence</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" id="Reftext" name="reference" value="<?PHP echo urldecode($reference); ?>"  placeholder="Ref.." class="form-control" readonly> <!-- RefVerif(this.id,'textRef')-->
                                    <input type="hidden" class="CHECK" required="" id="Reftext_ck">
                                </div>
                                <p id="textRef" class="ErrFah"></p>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Nom Client</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" id="Nomtext"  name="nom_client" value="<?PHP echo $nom_client; ?>" data-parsley-minlength="6"  placeholder="" class="form-control" readonly >
                                    <input type="hidden" class="CHECK" required="" id="Nomtext_ck">
                                </div>
                                <p id="textNom" class="ErrFah"></p>
                            </div>
                            <!--                -->
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >identifiant du Client</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select  name="type_client" data-parsley-length="[5,10]"  class="form-control" >
                                        <option hidden selected="selected"><?PHP echo $type_client; ?></option>
                                        <!-- <option value="Oui">Oui</option>
                                        <option value="Non">Non</option> -->
                                    </select>
                                </div>
                                <p id="textcat" class="ErrFah"></p>
                            </div> 

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" id="PrixTTCtext" >Prix total</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" id="Prixtext" value="<?PHP echo $prix_total; ?>" name="prix_total" data-parsley-maxlength="6"  value="0" placeholder="" readonly class="form-control" onblur="FloatVerif(this.id,'textPrix','Prixtext_ck')">
                                    <input type="hidden" class="CHECK" required="" id="Prixtext_ck">
                                </div>
                                <p id="textPrix" class="ErrFah"></p>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Paiment</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select  name="paiment" data-parsley-length="[5,10]"  class="form-control" >
                                        <option  hidden selected="selected"><?PHP echo $paiment; ?></option>
                                        <!-- <option value="Cheque">Cheque</option>
                                        <option value="espece">espece</option>
                                        <option value="virement bancaire">virement bancaire</option> -->
                                    </select>
                                </div>
                                <input type="hidden" class="CHECK" required="" id="P_ck">
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Etat</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" id="Qutext"  name="etat" data-parsley-min="6" placeholder="" class="form-control" value="<?PHP echo $etat; ?>">
                                    <input type="hidden" class="CHECK" required="" id="Quantitetext_ck">
                                </div>
                                <p id="textquantite" class="ErrFah"></p>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Date D'ajout</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="date" id="ddate" name="date" data-parsley-min="6" placeholder="" readonly class="form-control" value="<?php echo $date; ?>" > <!-- -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" >Description</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea  class="form-control" name="description" style="height: 250px"><?PHP echo $description; ?></textarea>
                                </div>
                            </div>

                            <!-- -->

                            <!-- -->
                            <div class="form-group row text-right">
                                <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                    <button type="submit" id="Ssubmit" class="btn btn-space btn-primary" name="modifier" value="ajouter">Submit</button>
                                    <a class="btn btn-space btn-secondary" href="afficherCommande.php">Retour</a>
                                </div>
                            </div>
                            <td><input type="hidden" name="ide" value="<?PHP echo $id; ?>"></td>

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
    header("Location:../../../../../Back Office ENACTUS/Les Modules/Gestion Admins/login/page-login.php");

}
?>