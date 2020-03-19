<?php
session_start();

include "../entities/Banniere.php";
include "../core/BanniereC.php";
if (isset($_SESSION["login_in"])) {
    if ($_SESSION["ID"] == "superUser") {
        $id=$_SESSION["ID"];
        $sql="SELECT * from admin where ID='$id' ";
		$db = config::getConnexion();
        $currentUSER=$db->query($sql);

        if (isset($_GET['id'])){
            $BanniereC=new BanniereC();
            $result=$BanniereC->recupererBanniere($_GET['id']);
            foreach($result as $row){
                $id=$row['id'];
                $nom=$row['Nom'];
                $espace=$row['espaceBanniereProjet'];
                $dateD=$row['dateDebut'];
                $dateF=$row['dateFin'];
                $dateA=$row['dateAjout'];
                $url=$row['lienURL'];
                $desc=$row['description'];
                $cheminImage=$row['image'];
            }
        }
?>
<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modifier Banniere <?php echo $nom ?> </title>
    <meta name="description" content="Ajouter Admins">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../../../images/enactus-png.png">
    <link rel="shortcut icon" href="../../../images/enactus-png.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

</head>

<body>
            <!--left-panel -->
            <aside id="left-panel" class="left-panel">
                <nav class="navbar navbar-expand-sm navbar-default">
                    <div id="main-menu" class="main-menu collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="menu-item-has-children dropdown">
                                <a class="dropdown-toggle" href="../../../index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                            </li>

                            <?php if($_SESSION["ID"] == "superUser")
                            {?>

                                <li class="menu-title">Super Admin</li><!-- /.menu-title -->
                                <li class="menu-item-has-children dropdown" >
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Gestion Admins</a>
                                    <ul class="sub-menu children dropdown-menu">
                                        <li  ><i class="menu-icon fa fa-eye" ></i><a href="../../Gestion Admins/CAdmins.php">Consulter et Ajouter</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children dropdown" >
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Gestion Projets</a>
                                    <ul class="sub-menu children dropdown-menu">
                                        <li><i class="menu-icon fa fa-eye"></i><a href="../../Gestion Projets/CProjets.php">Consulter et Ajouter</a></li>
                                    </ul>
                                </li>

                                <!-- Amine Module -->
                                <li class="dropdown">
                                    <a href="../../Marketing - Newsletter/views/CMarketing-Newsletter.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-envelope"></i>Gestion Newsletters</a>
                                </li>

                                <li class="dropdown">
                                    <a href="../../Markenting - ListeContact/views/CMarketing-ListeContact.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Listes de Diffusions</a>
                                </li>

                                <li class="dropdown" style="background: #ffbe27;position: relative;">
                                    <a href="../../Markenting - Banniere/views/CMarketing-Banniere.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Gestion des Bannieres</a>
                                </li>
                                <!-- Fin Amine Module -->

                                <!-- Ahmed Module -->
                                <li class="menu-item-has-children dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Gestion des Fournisseurs</a>
                                    <ul class="sub-menu children dropdown-menu">
                                        <li><i class="menu-icon fa fa-eye"></i><a href="../../Gestion Fournisseur/views/afficherSociete.php">Consulter Societe</a></li>
                                        <li><i class="menu-icon fa fa-eye"></i><a href="../../Gestion Fournisseur/views/afficherPersonne.php">Consulter Personne</a></li>
                                        <li><i class="menu-icon fa fa-plus-circle"></i><a href="../../Gestion Fournisseur/views/AFournisseur.html">Ajouter</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Les Livraisons</a>
                                    <ul class="sub-menu children dropdown-menu">
                                        <li><i class="menu-icon fa fa-eye"></i><a href="../../Gestion Livraisons/views/afficherLivraison.php">Consulter</a></li>
                                    </ul>
                                </li>
                                <!-- Fin Ahmed Module -->

                            <?php } ?>

                            <li class="menu-title">Gestions</li><!-- /.menu-title -->

                            <!-- Fahd Module -->
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-bell"></i>Produits</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../../gestion produit/php/views/afficherProduit.php">Consulter</a></li>
                                    <li><i class="menu-icon fa fa-plus-circle"></i><a href="../../gestion produit/php/views/ajouterProduit.php">Ajouter</a></li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children dropdown"  >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Commandes</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../../Gestion Commandes/php/views/afficherCommande.php">Consulter</a></li>
                                    <!--<li><i class="menu-icon fa fa-plus-circle"></i><a href="../../../Gestion Commandes/php/views/ajouterCommande.php">Ajouter</a></li>-->
                                </ul>
                            </li>

                            <!-- Fin Fahd Module -->

                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-smile-o"></i>Points Fidélités</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-user-circle"></i><a href="../../Gestion%20Point%20Fidelite/PointsClients/views/Consulter-PointsClients.php">Points Clients</a></li>
                                    <li><i class="menu-icon fa fa-gift"></i><a href="../../Gestion%20Point%20Fidelite/PointsProduits/views/CMarketing-PointsProduits.php">Points Produits</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-reply"></i>Demande Retour</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../../Gestion%20Demande/view/afficher_demande_super_admin.php">Afficher SuperAdmin</a></li>
                                    <li><i class="menu-icon fa fa-bullseye"></i><a href="../../Gestion%20Demande/view/afficher_demande.php">Afficher Admin</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-credit-card"></i>Réclamations</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../../Gestion%20Reclamations/view/afficher_reclamation_super_admin.php">Afficher SuperAdmin</a></li>
                                    <li><i class="menu-icon fa fa-bullseye"></i><a href="../../Gestion%20Reclamations/view/afficher_reclamation.php">Afficher Admin</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-heart"></i>Recommandation </a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../../Gestion%20Recommandations/Recommandation/views/afficher_recommandation.php">Consulter</a></li>
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
                    <a class="navbar-brand" href="./"><img  src="../../../images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="../../../images/logo2.png" alt="Logo"></a>
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
                                    <span class="photo media-left"><img alt="avatar" src="../../../images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="../../../images/avatar/2.jpg"></span>
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
                                    <span class="photo media-left"><img alt="avatar" src="../../../images/avatar/4.jpg"></span>
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
                                        <img class="user-avatar rounded-circle" src="../../Gestion Admins/<?PHP echo $row['image'];?>" alt="User Avatar">
                                    </a>

                                    <div class="user-menu dropdown-menu">
                                        <a class="nav-link" href="#"><i class="fa fa- user"></i>
                                            <?PHP echo $row['pseudo']; ?></a>
                                        <a class="nav-link" href="../../Gestion Admins/login/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
        </header>
        <!-- /#header -->

        <!-- content -->
        <div class="content">
 <!-- EKTOB HOUNI -->
 <a href="CMarketing-Banniere.php"> <button class="btn btn-space btn-secondary"  style="float: left;" > Retour </button></a>
 <br><br>
 <!-- ============================================================== -->
                        <!-- valifation types -->
                        <!-- ============================================================== -->
                        <div >
                            <div class="card">
                                <h5 class="card-header" align=center>Modification de la Banniere :  <?php echo $nom." id: ".$id;?> </h5>
                                <div class="card-body">
									<form id="BanniereAjoutForm" onsubmit="return OkFormModif()"  method="POST" >
                                        <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Id de la Banniere</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="text" name="id_Banniere" required="required" id="Iid_Banniere" class="form-control" value="<?php echo $id;?>" readonly>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Nom de la Banniere</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="text" name="Nom_Banniere" required="required" id="INom_Banniere" value="<?php echo $nom;?>" placeholder="Libellé" class="form-control" onkeyup="CheckInfoLettreChiffre(this)" >
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">espace Affichage de la Banniere</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="text" name="Espace_Banniere" required="required" id="IEspace_Banniere" class="form-control" value="<?php echo $espace;?>" readonly>
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Date Début de la Banniere</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="date" name="DateD_Banniere" required="required" id="IDateD_Banniere" placeholder="Objet" value="<?php echo $dateD;?>" class="form-control" onchange="CheckDateDebut()">
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Date Fin de la Banniere</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="date" name="DateF_Banniere" required="required" id="IDateF_Banniere" placeholder="Objet" value="<?php echo $dateF;?>" class="form-control" onchange="CheckDateFin()">
                                                </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Date Ajout de la Banniere</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="text" name="DateA_Banniere" required="required"  id="IObjet_Banniere" placeholder="Objet" value="<?php echo $dateA;?>" class="form-control" readonly>
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Lien URL de la Banniere</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="text" name="URL_Banniere" required="required" id="IURL_Banniere" placeholder="Objet" value="<?php echo $url;?>" class="form-control" onkeyup="is_url(this)">
                                                </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Déscription de la Banniere</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="text" name="Desc_Banniere" required="required" id="IDesc_Banniere" placeholder="Objet" value="<?php echo $desc;?>" class="form-control" onkeyup="CheckallTextArea(this)">
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right"> Image de la Banniére </label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <img src="../ImageBanniereUpload/<?php echo $cheminImage ?>" alt="<?php echo $nom ?>" width=300px height=auto>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="Submit" value="Update" name="update" class="btn btn-space btn-primary" onclick="OkForm()">Modifier</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
						</div>
                        <!-- ============================================================== -->
                        <!-- end valifation types -->
                        <!-- ============================================================== -->

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
    <script src="../../../assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="../../../assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="../../../assets/js/init/fullcalendar-init.js"></script>

    <script>
    
function CheckInfoLettre(e)
{
	var regex = /^[a-zA-Zéàèç ]{2,30}$/m;
   	if(!regex.test(e.value))
   	{
    	e.style.borderColor = "red" ;
      	return false;
   	}
   	else
   	{
		e.style.borderColor = "" ;
    	return true;
   	}
}

function CheckInfoLettreChiffre(e)
{
	var regex = /^[a-zA-Z0-9éàèç., _-]{2,}$/ ;
	if(!regex.test(e.value))
	{
	 e.style.borderColor = "red" ;
	   return false;
	}
	else
	{
	 e.style.borderColor = "" ;
	 return true;
	}
}

function CheckallTextArea(e)
{
	var regex = /^[a-zA-Z0-9éàèç.,"'&\n _-]{15,}$/ ;
	if(!regex.test(e.value))
	{
	 e.style.borderColor = "red" ;
	   return false;
	}
	else
	{
	 e.style.borderColor = "" ;
	 return true;
	}
}

function CheckInfoSelectList(e,value)
{
	if( e.value== value || e.value == "" )
	{
		e.style.borderColor = "red" ;
      	return false;
	}
	else
	{
		e.style.borderColor = "" ;
    	return true;
	}
}

function CheckInfoEmail(e)
{
	var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z ]{2,4}$/;
   	if(!regex.test(e.value))
   	{
    	e.style.borderColor = "red" ;
      	return false;
   	}
   	else
   	{
		e.style.borderColor = "" ;
    	return true;
	}
}

function is_url(e)
{
  regexp =  /^(?:(?:https?|www):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
        if (!regexp.test(e.value))
        {
			e.style.borderColor = "red" ;
          	return false;
        }
        else
        {
			e.style.borderColor = "" ;
         	 return true;
		}
}

function CheckDateDebut()
{
	var dateD=BanniereAjoutForm.IDateD_Banniere;
	var MyDate = new Date();
	var dateA;
	dateA = (MyDate.getFullYear() +'-'+
				 ('0' + (MyDate.getMonth()+1)).slice(-2)+'-'+
				 ('0' + MyDate.getDate()).slice(-2) );
				
	//alert(dateA);
	//alert(dateD.value);
	if(dateD.value < dateA  )
	{
		dateD.style.borderColor = "red" ;
	 	return false;
	}
	else
	{
		dateD.style.borderColor = "" ;
	 	return true;
	}
}

function CheckDateFin()
{
	var dateD=BanniereAjoutForm.IDateD_Banniere;
	var dateF=BanniereAjoutForm.IDateF_Banniere;

	if(dateF.value <= dateD.value  )
	{
		dateF.style.borderColor = "red" ;
	 	return false;
	}
	else
	{
		dateF.style.borderColor = "" ;
	 	return true;
	}
}



function OkForm()
{
	var nom=CheckInfoLettreChiffre(BanniereAjoutForm.INom_Banniere);
	var dateD=CheckDateDebut();
	var dateF=CheckDateFin();
	var url=is_url(BanniereAjoutForm.IURL_Banniere);
	var desc=CheckallTextArea(BanniereAjoutForm.IDesc_Banniere);
	var img=document.getElementById("IImage_Banniere");
	var espace= document.getElementsByName("CheckBoxEspace[]");
	var espaceS= document.getElementsByName("spanRadio[]");
	var j=0;
	for (i=0;i<espace.length;i++)
	{
		if(espace[i].checked)
		{
			j++;
		}
	}
	if(!img.value)
	{
		img.style.backgroundColor="red";
	}
	else{img.style.backgroundColor="";}

	if(j==0)
	{
		for (i=0;i<espaceS.length;i++)
		{
			espaceS[i].style.color ="red";
		}
	}
	else
	{
		for (i=0;i<espaceS.length;i++)
		{
			espaceS[i].style.color ="";
		}
	}

	if(!img.value || !nom || !dateD || !dateF || !url || !desc || j==0)
	{
		return false;
	}
	return true;
}

function OkFormModif()
{
	var nom=CheckInfoLettreChiffre(BanniereAjoutForm.INom_Banniere);
	var dateD=CheckDateDebut();
	var dateF=CheckDateFin();
	var url=is_url(BanniereAjoutForm.IURL_Banniere);
	var desc=CheckallTextArea(BanniereAjoutForm.IDesc_Banniere);
	if(!nom || !dateD || !dateF || !url || !desc)
	{
		return false;
	}
	return true;
}

    </script>

    <?PHP
    if (isset($_POST['update']))
    {
        if ( (preg_match ("%^((https?://)|(www\.)|())([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i" , $_POST['URL_Banniere'] ))
            and (preg_match(' /^[a-zA-Z0-9][\p{L}-]*$/',$_POST['Nom_Banniere'])) 
            and (preg_match(' /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$_POST['DateD_Banniere']))
            and (preg_match(' /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$_POST['DateF_Banniere']))
            and (preg_match(' /^[a-zA-Z0-9éàèç.,"&\n _-]{4,}$/',$_POST['Desc_Banniere']))
            )
        {
        $espace=$_POST['Espace_Banniere'];

        $BanniereA=new Banniere($_POST['Nom_Banniere'],$espace,$_POST['DateD_Banniere'],
                            $_POST['DateF_Banniere'],$_POST['URL_Banniere'],$_POST['Desc_Banniere'],$cheminImage);
        $BanniereAC=new BanniereC();
	    $BanniereAC->modifierBanniere($BanniereA,$_POST['id_Banniere']);
        echo ("<script> window.location.replace(\"CMarketing-Banniere.php\"); </script>");
        }
        else
        {
            echo ("<script> alert(\"Erreur dans les champs !! Js \")</script>");
            echo ("<script> history.back() </script>");
        }
    }
    ?>
</body>
<?php }
        else{echo "NOPeeeee";}
    }
    else
    {
        echo "NOP1";
        header("Location:../../../../Back Office ENACTUS/Les Modules/Gestion Admins/login/page-login.php");
    }
    ?>
</html>
