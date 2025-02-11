<?PHP
session_start();
if (isset($_SESSION["login_in"])) {
        if ($_SESSION["ID"] == "superUser") {
                                        include "../../../../core/ProjetC.php";
                                        include "../../../../entities/Projet.php";
                                        include "../../../../core/AdminC.php";
                                        $Projet1C=new ProjetC();
                                        $listeProjet=$Projet1C->afficherProjets();
                                        $listeODD=$Projet1C->afficherODD();
                                        $Admin1C = new AdminC();
                                        $currentUSER = $Admin1C->recupererAdmin($_SESSION["ID"]);
                                
                                        $sql="SElECT * From projet";
                                        $db = config::getConnexion();	
                                        try{
                                            $count=$db->query($sql);
                                            if ($count->rowCount())
                                            {
                                                $var=$count->rowCount();
                                                
                                            }
                                            else
                                            {
                                            ?>	<h1><?php echo "VIDE";?></h1> <?php
                                            }
                                
                                            }
                                            catch (Exception $e){
                                                die('Erreur: '.$e->getMessage());
                                            }
?>   
<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Consulter Projet</title>
    <meta name="description" content="Consulter Projets">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../../images/enactus-png.png">
    <link rel="shortcut icon" href="../../images/enactus-png.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="style.css"> 
  <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />


</head>

<body class="no_bar" id="body">
            <!--left-panel -->
            <aside id="left-panel" class="left-panel">
                <nav class="navbar navbar-expand-sm navbar-default">
                    <div id="main-menu" class="main-menu collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="menu-item-has-children dropdown">
                                <a class="dropdown-toggle" href="../../index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                            </li>

                            <?php if($_SESSION["ID"] == "superUser")
                            {?>

                                <li class="menu-title">Super Admin</li><!-- /.menu-title -->
                                <li class="menu-item-has-children dropdown" >
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Gestion Admins</a>
                                    <ul class="sub-menu children dropdown-menu">
                                        <li  ><i class="menu-icon fa fa-eye" ></i><a href="../Gestion Admins/CAdmins.php">Consulter et Ajouter</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children dropdown" style="background: #ffbe27;position: relative;">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Gestion Projets</a>
                                    <ul class="sub-menu children dropdown-menu">
                                        <li><i class="menu-icon fa fa-eye"></i><a href="../Gestion Projets/CProjets.php">Consulter et Ajouter</a></li>
                                    </ul>
                                </li>

                                <!-- Amine Module -->
                                <li class="dropdown">
                                    <a href="../Marketing - Newsletter/views/CMarketing-Newsletter.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-envelope"></i>Gestion Newsletters</a>
                                </li>

                                <li class="dropdown">
                                    <a href="../Markenting - ListeContact/views/CMarketing-ListeContact.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Listes de Diffusions</a>
                                </li>

                                <li class="dropdown">
                                    <a href="../Markenting - Banniere/views/CMarketing-Banniere.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Gestion des Bannieres</a>
                                </li>
                                <!-- Fin Amine Module -->

                                <!-- Ahmed Module -->
                                <li class="menu-item-has-children dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Gestion des Fournisseurs</a>
                                    <ul class="sub-menu children dropdown-menu">
                                        <li><i class="menu-icon fa fa-eye"></i><a href="../Gestion Fournisseur/views/afficherSociete.php">Consulter Societe</a></li>
                                        <li><i class="menu-icon fa fa-eye"></i><a href="../Gestion Fournisseur/views/afficherPersonne.php">Consulter Personne</a></li>
                                        <li><i class="menu-icon fa fa-plus-circle"></i><a href="../Gestion Fournisseur/views/AFournisseur.html">Ajouter</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Les Livraisons</a>
                                    <ul class="sub-menu children dropdown-menu">
                                        <li><i class="menu-icon fa fa-eye"></i><a href="../Gestion Livraisons/views/afficherLivraison.php">Consulter</a></li>
                                    </ul>
                                </li>
                                <!-- Fin Ahmed Module -->

                            <?php } ?>

                            <li class="menu-title">Gestions</li><!-- /.menu-title -->

                            <!-- Fahd Module -->
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-bell"></i>Produits</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../gestion produit/php/views/afficherProduit.php">Consulter</a></li>
                                    <li><i class="menu-icon fa fa-plus-circle"></i><a href="../gestion produit/php/views/ajouterProduit.php">Ajouter</a></li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children dropdown"  >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Commandes</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../Gestion Commandes/php/views/afficherCommande.php">Consulter</a></li>
                                    <!--<li><i class="menu-icon fa fa-plus-circle"></i><a href="../../../Gestion Commandes/php/views/ajouterCommande.php">Ajouter</a></li>-->
                                </ul>
                            </li>

                            <!-- Fin Fahd Module -->

                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-smile-o"></i>Points Fidélités</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-user-circle"></i><a href="../Gestion%20Point%20Fidelite/PointsClients/views/Consulter-PointsClients.php">Points Clients</a></li>
                                    <li><i class="menu-icon fa fa-gift"></i><a href="../Gestion%20Point%20Fidelite/PointsProduits/views/CMarketing-PointsProduits.php">Points Produits</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-reply"></i>Demande Retour</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../Gestion%20Demande/view/afficher_demande_super_admin.php">Afficher SuperAdmin</a></li>
                                    <li><i class="menu-icon fa fa-bullseye"></i><a href="../Gestion%20Demande/view/afficher_demande.php">Afficher Admin</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-credit-card"></i>Réclamations</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../Gestion%20Reclamations/view/afficher_reclamation_super_admin.php">Afficher SuperAdmin</a></li>
                                    <li><i class="menu-icon fa fa-bullseye"></i><a href="../Gestion%20Reclamations/view/afficher_reclamation.php">Afficher Admin</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-heart"></i>Recommandation </a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="../Gestion%20Recommandations/Recommandation/views/afficher_recommandation.php">Consulter</a></li>
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
                    <a class="navbar-brand" href="./"><img  src="../../images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="../../images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form method="GET" class="search-form">
                            <input type="text" name="RC" class="form-control mr-sm-2"  placeholder="Recherche par nom du projet ..." aria-label="Search">
                            <input type="submit" name="ONrech" style="position:relative;left:1050px;bottom:40px;" class="btn btn-outline-danger btn-sm" value="Rechercher" />
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                            <?php
                        if (isset($_GET['RC']))
                        {
                            $RchProjet=$Projet1C->rechercherListeProjets($_GET['RC']);
                        }
                        ?>
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
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
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
                            foreach ($currentUSER as $row) {
                              
                                ?>
                                <div class="user-area dropdown float-right">
                                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="user-avatar rounded-circle" src="../Gestion Admins/<?PHP echo $row['image']; ?>" alt="User Avatar">
                                    </a>

                                    <div class="user-menu dropdown-menu">
                                        <a class="nav-link" href="#"><i class="fa fa- user"></i>
                                            <?PHP echo $row['pseudo']; ?></a>
                                        <a class="nav-link" href="../Gestion%20Admins/login/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>

        </header>
        <!-- /#header -->

        <!-- content -->
        <div class="content" >
    
            <div class="col-xl-8" style="max-width: 70%;">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Les Projet <button id="myBtn" style="float:right;" class="btn btn-outline-success btn-lg active" >Ajouter</button></h4>
                                     
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <form method="GET">
                                        <th>#</th>
                                        <th>Logo</th>
                                        <th>ID</th>
                                        <th><button type="submit" name="triNom" class="btn btn-link" type="reset">Nom <i class="fa fa-sort-alpha-asc"></i></button></th>
                                        <th>date derniere modification</th>
                                        <th>Type</th>
                                        <th>Modifier et Supprimer</th>
                                      </form>  
                                    </tr>
                                </thead>
                                <tbody>
                                     <?PHP
                                        if(isset ($_GET['triNom']))
                                     {
                                    $TriProjet=$Projet1C->tri();
                                    $listeProjet=$TriProjet;
                                    }
                                     if( isset ($_GET['ONrech']) )
                                     {
                                         $listeProjet=$RchProjet;
                                     }
                                $i=1;
                                foreach($listeProjet as $row){
                                ?>
                              <tr id="projet<?php echo $i?>">
                                        <td class="serial"><?php echo $i?></td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <img class="rounded-circle" src="<?PHP echo $row['logo']; ?>" alt="">
                                            </div>
                                        </td>
                                        <td class="ID"><?PHP echo $row['ID']; ?></td>
                                        <td class="name"><?PHP echo $row['nom']; ?></td>
                                        <td class="date"><?PHP echo $row['date']; ?></td>
                                        <td>
                                    <?php 
                                    $string=$row['type'];
                                    $x=substr_count($string,"|");
                                    for ($i=0;$i<=$x;$i++)
                                    {
                                    $d=strpos($string,"|");
                                    $tmp=substr($string,0,$d);
                                    $string=substr($string,$d+1,strlen($string));
                                    echo "<img class=\"rounded-circle\" src=".$tmp.">";
                                    }
                                    ?>
                                        </td>
                                        <td> 
                                                <a class="btn btn-outline-primary btn-sm" href="MProjets.php?ID=<?PHP echo $row['ID']; ?>">Modifier</a>
                                                <hr>
                                            <form method="POST" action="supprimerProjet.php">
                                            <input type="hidden" value="<?PHP echo $row['ID']; ?>" name="ID">
                                           <input type="submit" class="btn btn-outline-danger btn-sm" value="Supprimer" /> 
                                           </form>
                                        </td>
                                    </tr>
                                    <?php
                                   if( isset ($_POST['Modifier']) )
                                    {
                                        $_GET['ID'];
                                    }
                                $i++;    
                            }                  
?> 
                                    </tbody>
                                    </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
                
            </div>  <!-- /.col-lg-8 -->

            <!--Ajouter Modal-->
            <div >

            <div id="myModal" class="modal">
            

              <div class="modal-content">
                <span class="close">&times;</span>



            <!-- Formulaire d'ajout -->
<div>
    <div class="col-md-4" style="float:right;">
    </div>
    <div class="col-lg-6" style="left:250px;">
        <div class="card">
            <div class="card-header">Ajouter Projet</div>
            <div class="card-body card-block">
                <form action="ajoutProjet.php" method="post" onsubmit="return verifForm(this)" enctype="multipart/form-data" >
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-users"></i></div>
                            <input type="text" id="username" name="nomProjet" placeholder="Nom du Projet" class="form-control" oninput="verifPseudo(this)" />
                        </div>
                    </div>

                    <div class="form-group">
                            <div class="input-group-addon"> <i class="fa fa-pagelines"></i> <br> Ajouter Votre LOGO</div>
                            <br>
                    <label for="file" class="label-file" style="margin-left: 150px;">
                            <ul class="caption-style-1" >
                                    <li>
                                        <img id="image" src="./unknown.png" alt="" >
                                        <div class="caption">
                                            <div class="blur"></div>
                                            <div class="caption-text">
                                                <h1>Ajouter Logo</h1>
                                                <img alt="plus"  src="../Gestion Admins/plus.png" style="width: 40px;height: 40px;margin-left: 55px;filter: invert(100%);margin-top: 10px;"  >
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                    </label> 
                    <input type="file" name="imageLogo" id="file" class="inputfile" accept="image/*" title="Ajouter des photos" onchange="loadFile(event)" />
                </div>
                
                <div>
     <table>
<?PHP
    $i=1;
    $j=1;
    $a=1;
    ?>
    <tr name="ligne1">
    <div class="form-group">
                        <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-tasks"></i>    Objectifs de développement durable :</div>
                        </div>
                    </div>
    <?php
foreach($listeODD as $row){

    if ($i == 7)
    {
        $j++;
        $i=1;?>
        <tr name="ligne<?php echo $j?>">
            <?php
    }
    $i++;
    ?>
    
<th>
    <td><input id="ODD<?php echo $a?>" type="checkbox" name="ODD[]" value="./ODD/<?php echo $a?>.png">
     <label for="ODD<?php echo $a?>"><img src="./ODD/<?php echo $a?>.png"></label>
 </td>
</th>
<?php
    $a++; 
}
?>
</table>
</div>
    
                    
                    <div class="form-actions form-group"><input type="submit" value="Valider" class="btn btn-success btn-sm" style="float:right;"  /></div>
                </form>
            </div>
        </div>
    </div>

                </div>
              </div>       
            </div>
        </div>



            <!--/Ajouter Modal-->
                            
            <!-- Footer -->
                            <footer class="site-footer">
                                <div class="footer-inner bg-white">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            Copyright &copy; 2019 Taha Admin
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            Designed by <a href="https://colorlib.com">WASP</a>
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
    <script src="../../assets/js/main.js"></script>
    <script src="script.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="../../assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="../../assets/js/init/fullcalendar-init.js"></script>

</body>
</html>
        <?php }}
else
{


    echo "NOPeeeee";
    header("Location:../../../Back Office ENACTUS/Les Modules/Gestion Admins/login/page-login.php");

}?>
