<?PHP
include "../../core/AdminC.php";
include "../../core/ClientC.php";
session_start();
if (isset($_SESSION["login_in"])) {
    if (!empty($_SESSION["ID"])) {
        $Admin1C = new AdminC();
        $currentUSER = $Admin1C->recupererAdmin($_SESSION["ID"]);

        $Nprojets=0;
        $connect = mysqli_connect('localhost','root','','bweb');
        $query = "SELECT  count(*) as projets FROM projet ";  
        $resultP = mysqli_query($connect, $query);
        foreach($resultP as $rr)
        {
            $Nprojets+=$rr['projets'];
        }

        $Nclients=0;
        $query = "SELECT date, count(*) as Clients FROM client GROUP BY date";  
        $result = mysqli_query($connect, $query); 

        $query = "SELECT count(*) as nc FROM commande ";  
        $resultNC = mysqli_query($connect, $query); 
        foreach($resultNC as $nc)
        {
            $nbCommande=$nc['nc'];
        }

        $query = "SELECT sum(prix_total) as tt FROM commande ";  
        $resultpt = mysqli_query($connect, $query); 
        foreach($resultpt as $pt)
        {
            $revenues=$pt['tt'];
        }
        ?>
        <!doctype html>
        <html class="no-js" lang="">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>ENACTUS ESPRIT Dashboard</title>
            <meta name="description" content="ENACTUS ESPRIT Dashboard">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="apple-touch-icon" href="images/enactus-png.png">
            <link rel="shortcut icon" href="images/enactus-png.png">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
            <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
            <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['date', 'Clients'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                            $Nclients+=$row["Clients"];
                               echo "['".$row["date"]."', ".$row["Clients"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '',  
                      //is3D:true,  
                     };  
                var chart = new google.visualization.BarChart(document.getElementById('traffic-chartTaha'));  
                chart.draw(data, options);  
           }  
           </script> 
        </head>

        <body>
            <!--left-panel -->
            <aside id="left-panel" class="left-panel">
                <nav class="navbar navbar-expand-sm navbar-default">
                    <div id="main-menu" class="main-menu collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li style="background: #ffbe27;position: relative;">
                                <a class="dropdown-toggle" href="#"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                            </li>
                            <?php if($_SESSION["ID"] == "superUser")
                                {?>
                            <li class="menu-title">Super Admin</li><!-- /.menu-title -->
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Gestion Admins</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="./Les Modules/Gestion Admins/CAdmins.php">Consulter et Ajouter</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Gestion Projets</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="./Les Modules/Gestion Projets/CProjets.php">Consulter et Ajouter</a></li>
                                </ul>
                            </li>
                            <!-- Amine Module -->
                            <li style="dropdown"> 
                                <a href="./Les Modules/Marketing - Newsletter/views/CMarketing-Newsletter.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-envelope"></i>Gestion Newsletters</a>
                            </li>
                            
                            <li style="dropdown"> 
                                <a href="./Les Modules/Markenting - ListeContact/views/CMarketing-ListeContact.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Listes de Diffusions</a>
                            </li>

                            <li style="dropdown"> 
                                <a href="./Les Modules/Markenting - Banniere/views/CMarketing-Banniere.php"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Gestion des Bannieres</a>
                            </li>
                            <!-- Fin Amine Module -->

                            <!-- Ahmed Module -->
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Gestion des Fournisseurs</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="./Les Modules/Gestion Fournisseur/views/afficherSociete.php">Consulter Societe</a></li>
                                    <li><i class="menu-icon fa fa-eye"></i><a href="./Les Modules/Gestion Fournisseur/views/afficherPersonne.php">Consulter Personne</a></li>
                                    <li><i class="menu-icon fa fa-plus-circle"></i><a href="./Les Modules/Gestion Fournisseur/views/AFournisseur.html">Ajouter</a></li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Les Livraisons</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="./Les Modules/Gestion Livraisons/views/afficherLivraison.php">Consulter</a></li>
                                </ul>
                            </li>
                            <!-- Fin Ahmed Module -->

                            <?php } ?>

                            <li class="menu-title">Gestions</li><!-- /.menu-title -->

                            <!-- Fahd Module -->
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-bell"></i>Produits</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="./Les Modules/gestion produit/php/views/afficherProduit.php">Consulter</a></li>
                                    <li><i class="menu-icon fa fa-plus-circle"></i><a href="./Les Modules/gestion produit/php/views/ajouterProduit.php">Ajouter</a></li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Commandes</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="./Les Modules/Gestion Commandes/php/views/afficherCommande.php">Consulter</a></li>
                                </ul>
                            </li>

                            <!-- Fin Fahd Module -->

                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-smile-o"></i>Points Fidélités</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-user-circle"></i><a href="./Les Modules/Gestion Point Fidelite/PointsClients/views/Consulter-PointsClients.php">Points CLients</a></li>
                                    <li><i class="menu-icon fa fa-gift"></i><a href="./Les Modules/Gestion Point Fidelite/PointsProduits/views/CMarketing-PointsProduits.php">Points Produits</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-reply"></i>Demande Retour</a>
                                <ul class="sub-menu children dropdown-menu">
                                <?php if($_SESSION["ID"] == "superUser"){?>
                                    <li><i class="menu-icon fa fa-eye"></i><a href="./Les Modules/Gestion Demande/view/afficher_demande_super_admin.php">Afficher SuperAdmin</a></li>
                                    <?php } else{?>
                                    <li><i class="menu-icon fa fa-bullseye"></i><a href="./Les Modules/Gestion Demande/view/afficher_demande.php">Afficher Admin</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-credit-card"></i>Réclamations</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <?php if($_SESSION["ID"] == "superUser"){?>
                                    <li><i class="menu-icon fa fa-eye"></i><a href="./Les Modules/Gestion Reclamations/view/afficher_reclamation_super_admin.php">Afficher SuperAdmin</a></li>
                                    <?php } else{?>
                                    <li><i class="menu-icon fa fa-bullseye"></i><a href="./Les Modules/Gestion Reclamations/view/afficher_reclamation.php">Afficher Admin</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-heart"></i>Recommandation </a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-eye"></i><a href="./Les Modules/Gestion Recommandations/Recommandation/views/afficher_recommandation.php">Consulter</a></li>
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
                            <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
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

                                <div class="dropdown for-message ">
                                    <a href="./MailBox.php" class="btn btn-secondary dropdown-toggle" >
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </div>
                            </div>

                            <?php
                            foreach($currentUSER as $row){

                            ?>
                            <div class="user-area dropdown float-right">
                                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="user-avatar rounded-circle" src="./Les Modules/Gestion Admins/<?PHP echo $row['image'];?>" alt="User Avatar">
                                    </a>

                                    <div class="user-menu dropdown-menu">
                                        <a class="nav-link" href="#"><i class="fa fa- user"></i>
                                            <?PHP echo $row['pseudo']; ?></a>
                                        <a class="nav-link" href="./Les Modules/Gestion Admins/login/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                </header>
                <!-- /#header -->
                <!-- Content -->
                <div class="content">
                    <!-- Animated -->
                    <div class="animated fadeIn">
                        <!-- Widgets  -->
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-1">
                                                <i class="pe-7s-cash"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count"><?php echo $revenues ?></span> DT</div>
                                                    <div class="stat-heading">Revenue</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-2">
                                                <i class="pe-7s-cart"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count"><?php echo $nbCommande ?></span></div>
                                                    <div class="stat-heading">Nombre de Commandes</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-3">
                                                <i class="pe-7s-browser"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count"><?php echo $Nprojets ; ?></span></div>
                                                    <div class="stat-heading">Projets</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-4">
                                                <i class="pe-7s-users"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count"><?php echo  $Nclients;?></span></div>
                                                    <div class="stat-heading">Clients</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Widgets -->
                        <!--  Traffic  -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="box-title">Statistique : Date de création des comptes clients </h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="card-body">
                                                <!-- Stat Taha Date de création des comptes clients  -->
                                                <div id="traffic-chartTaha" class="traffic-chart"></div>
                                            </div>
                                        </div>

                                    </div> <!-- /.row -->
                                    <div class="card-body"></div>
                                </div>
                            </div><!-- /# column -->
                        </div>
                        <!--  /Traffic -->
                        <div class="clearfix"></div>

                        <!-- To Do and Live Chat -->
                        <div class="row">

                            <div class="col-md-12 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="box-title">Chandler</h4> -->
                                        <div class="calender-cont widget-calender">
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                </div><!-- /.card -->
                            </div>

<?php
$ida=$_SESSION["ID"];
$connect = mysqli_connect('localhost','root','','bweb');
$query = "SELECT  * FROM todo_liste where id_admin='$ida' ";  
$todo = mysqli_query($connect, $query);
?>
                       
                        <!-- /Calender Chart Weather -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title box-title">To Do List   <a data-toggle="modal" data-target="#exampleModalCenter"  href=""><i class="fa fa-check btn btn-warning btn-sm"> Ajouter Tâche </i></a></h4>
                                        <div class="card-content">
                                            <div class="todo-list">
                                                <div class="tdl-holder">
                                                    <div class="tdl-content">
                                                        <ul>
                                                            <?php
                                                            foreach($todo as $td)
                                                            {
                                                                $idt=$td['id'];
                                                                $desc=$td['description'];
                                                                $eta=$td['etat'];
                                                            ?>
                                                            <li>
                                                                <label>
                                                                    <i class="check-box"></i> <?php if($eta == "Done") { ?> <del><span><?php echo $desc ;?></span></del> <?php }
                                                                                                                     else { ?> <span><?php echo $desc ;?></span> <?php }?>

                                                                    <a title="Supprimer la Tâche" href="./Les Modules/Gestion ToDo/supprimerTODO.php?id=<?php echo $idt ?>" class="fa fa-times"></a>

                                                                    <!-- <a title="Modifier la Tâche" href='#' class="fa fa-pencil"></a> -->

                                                                    <a title="Terminer la Tâche" href='./Les Modules/Gestion ToDo/CheckTODO.php?id=<?php echo $idt ?>' class="fa fa-check"></a>

                                                                </label>
                                                            </li>

                                                            <!-- ajouter Modal -->
                                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter Une Tâche</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </div>
                                                                <form method="POST" >
                                                                    <div class="modal-body">
                                                                        <h4>La Tâche :</h4>
                                                                        <input class="form-control" type="text" name="tacheD" > 
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                                                                        <button type="submit" name="saveT" class="btn btn-warning">Ajouter la Tâche</button>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <!-- Fin Ajouter Modal -->
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if(isset($_POST['saveT']))
                                                            {
                                                                $desc=$_POST['tacheD'];
                                                                $query = "Insert into  todo_liste (id_admin,description,etat) Values ('$ida','$desc','En Cours') ";  
                                                                $Ajout = mysqli_query($connect, $query);
                                                                ?>
                                                            <script> window.location = "index.php" </script>
                                                            <?php

                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> <!-- /.todo-list -->
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div><!-- /.card -->
                            </div>

 
                        
                        <!-- /To Do and Live Chat -->

                        <!-- Modal - Calendar - Add New Event -->
                        <div class="modal fade none-border" id="event-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><strong>Add New Event</strong></h4>
                                    </div>
                                    <div class="modal-body"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                        <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /#event-modal -->
                        <!-- Modal - Calendar - Add Category -->
                        <div class="modal fade none-border" id="add-category">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><strong>Add a category </strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">Category Name</label>
                                                    <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">Choose Category Color</label>
                                                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                        <option value="success">Success</option>
                                                        <option value="danger">Danger</option>
                                                        <option value="info">Info</option>
                                                        <option value="pink">Pink</option>
                                                        <option value="primary">Primary</option>
                                                        <option value="warning">Warning</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /#add-category -->
                    </div>
                    <!-- .animated -->
                </div>
                <!-- /.content -->
                <div class="clearfix"></div>
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
            <!-- /#right-panel -->

            <!-- Scripts -->
            <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
            <script src="assets/js/main.js"></script>

            <!--  Chart js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

            <!--Chartist Chart-->
            <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
            <script src="assets/js/init/weather-init.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
            <script src="assets/js/init/fullcalendar-init.js"></script>

            <!--Local Stuff GRAPH-->
            <script>
                jQuery(document).ready(function($) {
                    "use strict";

                    // Pie chart flotPie1
                    var piedata = [{
                            label: "Desktop visits",
                            data: [
                                [1, 32]
                            ],
                            color: '#5c6bc0'
                        },
                        {
                            label: "Tab visits",
                            data: [
                                [1, 33]
                            ],
                            color: '#ef5350'
                        },
                        {
                            label: "Mobile visits",
                            data: [
                                [1, 35]
                            ],
                            color: '#66bb6a'
                        }
                    ];

                    $.plot('#flotPie1', piedata, {
                        series: {
                            pie: {
                                show: true,
                                radius: 1,
                                innerRadius: 0.65,
                                label: {
                                    show: true,
                                    radius: 2 / 3,
                                    threshold: 1
                                },
                                stroke: {
                                    width: 0
                                }
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        }
                    });
                    // Pie chart flotPie1  End
                    // cellPaiChart
                    var cellPaiChart = [{
                            label: "Direct Sell",
                            data: [
                                [1, 65]
                            ],
                            color: '#5b83de'
                        },
                        {
                            label: "Channel Sell",
                            data: [
                                [1, 35]
                            ],
                            color: '#00bfa5'
                        }
                    ];
                    $.plot('#cellPaiChart', cellPaiChart, {
                        series: {
                            pie: {
                                show: true,
                                stroke: {
                                    width: 0
                                }
                            }
                        },
                        legend: {
                            show: false
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        }

                    });
                    // cellPaiChart End
                    // Line Chart  #flotLine5
                    var newCust = [
                        [0, 3],
                        [1, 5],
                        [2, 4],
                        [3, 7],
                        [4, 9],
                        [5, 3],
                        [6, 6],
                        [7, 4],
                        [8, 10]
                    ];

                    var plot = $.plot($('#flotLine5'), [{
                        data: newCust,
                        label: 'New Data Flow',
                        color: '#fff'
                    }], {
                        series: {
                            lines: {
                                show: true,
                                lineColor: '#fff',
                                lineWidth: 2
                            },
                            points: {
                                show: true,
                                fill: true,
                                fillColor: "#ffffff",
                                symbol: "circle",
                                radius: 3
                            },
                            shadowSize: 0
                        },
                        points: {
                            show: true,
                        },
                        legend: {
                            show: false
                        },
                        grid: {
                            show: false
                        }
                    });
                    // Line Chart  #flotLine5 End
                    // Traffic Chart using chartist
                    if ($('#traffic-chart').length) {
                        var chart = new Chartist.Line('#traffic-chart', {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                            series: [
                                [0, 18000, 35000, 25000, 22000, 0],
                                [0, 33000, 15000, 20000, 15000, 300],
                                [0, 15000, 28000, 15000, 30000, 5000]
                            ]
                        }, {
                            low: 0,
                            showArea: true,
                            showLine: false,
                            showPoint: false,
                            fullWidth: true,
                            axisX: {
                                showGrid: true
                            }
                        });

                        chart.on('draw', function(data) {
                            if (data.type === 'line' || data.type === 'area') {
                                data.element.animate({
                                    d: {
                                        begin: 2000 * data.index,
                                        dur: 2000,
                                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                        to: data.path.clone().stringify(),
                                        easing: Chartist.Svg.Easing.easeOutQuint
                                    }
                                });
                            }
                        });
                    }
                    // Traffic Chart using chartist End
                    //Traffic chart chart-js
                    if ($('#TrafficChart').length) {
                        var ctx = document.getElementById("TrafficChart");
                        ctx.height = 150;
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                                datasets: [{
                                        label: "Visit",
                                        borderColor: "rgba(4, 73, 203,.09)",
                                        borderWidth: "1",
                                        backgroundColor: "rgba(4, 73, 203,.5)",
                                        data: [0, 2900, 5000, 3300, 6000, 3250, 0]
                                    },
                                    {
                                        label: "Bounce",
                                        borderColor: "rgba(245, 23, 66, 0.9)",
                                        borderWidth: "1",
                                        backgroundColor: "rgba(245, 23, 66,.5)",
                                        pointHighlightStroke: "rgba(245, 23, 66,.5)",
                                        data: [0, 4200, 4500, 1600, 4200, 1500, 4000]
                                    },
                                    {
                                        label: "Targeted",
                                        borderColor: "rgba(40, 169, 46, 0.9)",
                                        borderWidth: "1",
                                        backgroundColor: "rgba(40, 169, 46, .5)",
                                        pointHighlightStroke: "rgba(40, 169, 46,.5)",
                                        data: [1000, 5200, 3600, 2600, 4200, 5300, 0]
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                tooltips: {
                                    mode: 'index',
                                    intersect: false
                                },
                                hover: {
                                    mode: 'nearest',
                                    intersect: true
                                }

                            }
                        });
                    }
                    //Traffic chart chart-js  End
                    // Bar Chart #flotBarChart
                    $.plot("#flotBarChart", [{
                        data: [
                            [0, 18],
                            [2, 8],
                            [4, 5],
                            [6, 13],
                            [8, 5],
                            [10, 7],
                            [12, 4],
                            [14, 6],
                            [16, 15],
                            [18, 9],
                            [20, 17],
                            [22, 7],
                            [24, 4],
                            [26, 9],
                            [28, 11]
                        ],
                        bars: {
                            show: true,
                            lineWidth: 0,
                            fillColor: '#ffffff8a'
                        }
                    }], {
                        grid: {
                            show: false
                        }
                    });
                    // Bar Chart #flotBarChart End
                });
            </script>
        </body>
        <?php }
        else{
            echo "NOPeeeee";
            header("location : ./Les Modules/Gestion Admins/login/page-login.php");
        }
    }
    else
    {
        echo "Les Modules\Gestion Admins\login";
        header("Location: Les Modules/Gestion Admins/login/page-login.php");
    }
    ?>
        </html>
            