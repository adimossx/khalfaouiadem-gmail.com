<?php
																				include "../../../../core/ProjetC.php";
																				include "../../../../core/ClientC.php";
																				session_start();
																				if($_SESSION["login_in"])
																				{
                                        $Projet1C=new ProjetC();
																				$listeProjet=$Projet1C->afficherProjets();
																				$Client1C=new ClientC();
																				$r=$Client1C->recupererClient($_SESSION["ID"]);
																				foreach ($r as $row)
																				{	$idClient=$row['ID'];
																					$name=$row['pseudo'];
																					
																					$image=$row['image'];
																					$mail=$row['mail'];
																					$passwd=$row['passwd'];
																					$adress=$row['Adresse'];
																				}
																				
?>
<!DOCTYPE html>
<html lang="fr">
<!-- Mirrored from escope.tn/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Mar 2019 13:51:51 GMT -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Informations - Enactus ICT</title>
    
    <link href="../css/ProfilClient.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<!-- Bootstrap CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
     <!-- CSS Custom -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
    <!-- favicon Icon -->
    <!--<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">-->
    <!-- CSS Plugins -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/animate.min.css">
        <link href="../css/gallery.css" rel="stylesheet">

        
        <!--== font-awesome ==-->
        
        <!--== magnific-popup ==-->
        <link href="../../assets/css/magnific-popup.css" rel="stylesheet">
        
        <!--== owl carousel ==-->
        <link href="../../assets/css/owl.carousel.css" rel="stylesheet">
        
        <!--== animate css ==-->
        <link href="../../assets/css/animate.min.css" rel="stylesheet">

        <!--== style css ==-->
        <link href="../../assets/css/style.css" rel="stylesheet">
        
        <!--== responsive css ==-->
        <link href="../../assets/css/responsive.css" rel="stylesheet">
        
        <!--== theme color css ==-->
        <link href="../../assets/css/theme-color.css" rel="stylesheet">

        <script src="../../assets/js/jquery-2.1.4.min.js"></script>

    <!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


</head>

<!-- regggergegege -->
<body style="background-color:rgb(52, 59, 73 );" >
<header class="navbar-fixed-top">
	<div class="container">
    	<div class="row">
        	<div class="header_top">
        		<div class="col-md-2">
            		<div class="logo_img">
						<a href="#home"><img src="../../images/logo3.png" alt="logoimage" width="100" height=auto style="margin-left: 50px;"></a>
					</div>
				</div>
					
				<div class="col-md-10">
					<div class="menu_bar">	
						<nav role="navigation" class="navbar navbar-default">
							<div class="navbar-header">
                                <button id="menu_slide"  aria-controls="navbar" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                  </button>
							   </div>					   
							  <div class="collapse navbar-collapse" id="navbar">                    
									<ul class="nav navbar-nav">
									  <li><a href="#" class="js-target-scroll"><?php echo $name;?></a></li>
										<li><a href="../indexClient.php#home" class="js-target-scroll">accueil</a></li>
									  <li><a href="../indexClient.php#services" class="js-target-scroll">Introduction</a></li>
									  <li><a href="../indexClient.php#work" class="js-target-scroll">Les Projets</a></li>
                                      <li><a href="../indexClient.php#contact" class="js-target-scroll">Contact</a></li>
																			<li><a href="../../login/logout.php" class="js-target-scroll">déconnexion</a></li>
                                      <li><a href="#" ><img src="<?php echo $image ?>" alt="https://www.flaticon.com/authors/freepik"	width="30px" height=auto style="background-color:none;" ></a></li>
																			<li><a href="../panier/cart.php"><img src="../Projet/assets/images/cart.svg" width="30px" height=auto style="background-color:none;filter: invert(100%); filter:brightness(100);"></a></li>

																		</ul>

              </div>
						</nav>
					</div>
    	  </div>
			  </div>
			</div>
		</div>
</header>

<section id="home">
	<div class="container">
    <h2 style="color:#fec139"> Votre Espace :</h2>

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<div class="profile-userpic">
					<img src="<?php echo $image ?>" class="img-responsive" alt="">
				</div>

				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
					<?php echo $name ?>
					</div>
					<!-- <div class="profile-usertitle-job">
						Agriculteur
					</div> -->
				</div>

				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="ProfilClient-Informations.php">
							<i class="fas fa-info-circle"></i>
							Mes Informations </a>
						</li>
                        
                        <li>
							<a href="ProfilClient-Commandes.php">
							<i class="fas fa-shopping-cart"></i>
							Mes Commandes </a>
                        </li>
                        
						<li>
							<a href="../../Gestion Reclamations/view/afficher_reclamation.php">
							<i class="fas fa-exclamation"></i>
							Mes Réclammations </a>
						</li>

						<li>
							<a href="../../Gestion Demande/view/afficher_demande.php">
							<i class="fas fa-reply"></i>
							Mes Demandes </a>
						</li>
                        
                        <li>
							<a href="">
							<i class="fas fa-sign-out-alt"></i>
							Déconnexion </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">

                <!-- Ekteb houni el code  -->
               <h4 style="color:black;"> Mes Informations: </h4>
               <?php 
                include '../../../Back Office ENACTUS/Les Modules/Gestion Point Fidelite/PointsClients/core/PointsClientsC.php';
                 $pfClient=new PointsClientsC();
              $pt=$pfClient->afficherPointsClient($idClient);
                ?>
               <h4 align="right" style="color:black;"> <?php echo $pt." Points" ?> </h4>

               <div >
                    <div class="form-group">
                        <label >Adresse Mail:</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $mail;?>" readonly>
                    </div>

                    <div class="form-group">
                        <label >Mot de Passe:</label>
                        <input type="password" class="form-control" id="pass" value="<?php echo $passwd;?>" readonly>
                    </div>

                    <div class="form-group">
                        <label >Adresse:</label>
                        <input type="text" class="form-control" id="Adresse" value="<?php echo $adress;?>" readonly>
                    </div>
                    <a href="ProfilClient-ModifInformations.php" class="btn btn-warning" > Modifier Vos Informations</a>
                </div>
            </div>
		</div>
	</div>
</div>
<br>
<br>
</div>
</section>
<script type="text/javascript"> 
	$(document).ready(function(){
	$("#menu_slide").click(function(){
		$("#navbar").slideToggle('normal');
	});
	});
 </script>
<!--Menu Js Right Menu-->
<script type="text/javascript">
$(document).ready(function(){
  $('#navbar > ul > li:has(ul)').addClass("has-sub");
  $('#navbar > ul > li > a').click(function() {
    var checkElement = $(this).next();
    $('#navbar li').removeClass('dropdown');
    $(this).closest('li').addClass('dropdown');	
    if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
      $(this).closest('li').removeClass('dropdown');
      checkElement.slideUp('normal');
    }
    if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
      $('#navbar ul ul:visible').slideUp('normal');
      checkElement.slideDown('normal');
    }
    if (checkElement.is('ul')) {
      return false;
    } else {
      return true;	
    }		
  });
});
<!--end-->
</script>
<script type="text/javascript">	
$("#navbar").on("click", function(event){
    event.stopPropagation();
});
$(".dropdown-menu").on("click", function(event){
    event.stopPropagation();
});
$(document).on("click", function(event){
    $(".dropdown-menu").slideUp('normal');
});	

$(".navbar-header").on("click", function(event){
    event.stopPropagation();
});
$(document).on("click", function(event){
    $("#navbar").slideUp('normal');
});		
</script>

<script src="../ajax/jquery-1.11.0.min.html"></script>
    <script src="../scripts/pyaari-main.1.0.js"></script>
    <script src="../scripts/pyaari-menu.1.0.js"></script>
</body>
<?php }
else
{
	header("Location:../../login/login.php");
} ?>
</html>