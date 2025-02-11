<?php
include "../../../../core/ProjetC.php";
include "../../../../core/ClientC.php";
session_start();
if ($_SESSION["login_in"]) {
	$Projet1C = new ProjetC();
	$listeProjet = $Projet1C->afficherProjets();
	$Client1C = new ClientC();
	$r = $Client1C->recupererClient($_SESSION["ID"]);
	foreach ($r as $row) {
		$name = $row['pseudo'];
		$image = $row['image'];
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


		<link href="../css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/animate.min.css">
		<link href="../css/gallery.css" rel="stylesheet">


		<link rel="stylesheet" type="text/css" href="popLiv.css" />


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
										<button id="menu_slide" aria-controls="navbar" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>
									<div class="collapse navbar-collapse" id="navbar">
										<ul class="nav navbar-nav">
											<li><a href="#" class="js-target-scroll"><?php echo $name; ?></a></li>
											<li><a href="../indexClient.php#home" class="js-target-scroll">accueil</a></li>
											<li><a href="../indexClient.php#services" class="js-target-scroll">Introduction</a></li>
											<li><a href="../indexClient.php#work" class="js-target-scroll">Les Projets</a></li>
											<li><a href="../indexClient.php#contact" class="js-target-scroll">Contact</a></li>
											<li><a href="../../login/logout.php" class="js-target-scroll">déconnexion</a></li>
											<li><a href="#"><img src="<?php echo $image ?>" alt="https://www.flaticon.com/authors/freepik" width="30px" height=auto style="background-color:none;"></a></li>
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

		<section id="home" >
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
										<li>
											<a href="ProfilClient-Informations.php">
											<i class="fas fa-info-circle"></i>
											Mes Informations </a>
										</li>
										
										<li class="active" >
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


								<h4 style="color:black;"> Mes Commandes: </h4>
								<br>
								<div class="table-responsive" style="background:white;">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Méthode de Paiement</th>
												<th scope="col">Etat de la Commande</th>
												<th scope="col">Prix Total</th>
												<th scope="col">Date de la Commande</th>
												<th scope="col">Telecharger Facture</th>
												<th scope="col">Consulter La livraison</th>
											</tr>
										</thead>
										<tbody>
											<?php
											include "../../../Back Office ENACTUS/Les Modules/Gestion Commandes/php/core/Commandes.php";
											include "../../../Back Office ENACTUS/Les Modules/Gestion Livraisons/core/livraisonC.php";
											include "../panier/LivreurC.php";
											$livraison1C = new LivraisonC();

											$Commandes = new Commandes();
											$rr = $Commandes->recupererCom($_SESSION["ID"]);
											$n = 0;
											$idc='';
											foreach ($rr as $key) {
												$n++;
												$idc = $key['id'];
												$MP = $key['paiment'];
												$prixtotal = $key['prix_total'];
												$date = $key['date'];
												$etats=$key['etat'];
												?>
												<tr>
													<th scope="row"><?php echo $idc; ?></th>
													<td><?php echo $MP; ?></td>
													<td>En Cours</td>
													<td><?php echo $prixtotal; ?> Dt</td>
													<td><?php echo $date; ?></td>

													<td><a class="btn btn-primary" target="_blank" href="../../../Back Office ENACTUS/Les Modules/Gestion Commandes/Factures/<?php echo $idc; ?>.pdf">Votre Facture</a></td>
													<td><button class="btn btn-warning" id="myBtnAhmed<?php echo $n; ?>">
															Consulter Livraison</button></td>
												</tr>

												<div id="myModalAhmed<?php echo $n ?>" class="modalAhmed">

													<!-- Modal content -->
													<div class="modal-contentAhmed">
														<span class="closeAhmed<?php echo $n ?>">&times;</span>
														<h2>Votre Livraison :</h2> <br>
														<?php
														$liste = $livraison1C->recupererLivraisonClient($idc);
														foreach ($liste as $row) {
															$etat = $row['etat'];
															$des = $row['designation'];
															$nomLivreur = $row['nomLivreur'];
															$dateConfirmerLiv = $row['dateConfirmerLiv'];
															$codeLiv = $row['CodeLiv'];
															
															echo "<strong>L'etat de votre livraison : </strong>";
															echo $etat;
															echo "<br>";
															echo "<strong>Votre Livreur : </strong>";
															echo $nomLivreur;
															echo "<br>";
															echo "<strong>La date de la confirmation d'achat : </strong>";
															echo $dateConfirmerLiv;
															echo "<br>";
															echo "<strong>Votre Code de Livraison : </strong>";
															echo $codeLiv;
															echo "<br>";
															
															$livreurC = new LivreurC();
															$url = $livreurC->recupererURLLivreur($nomLivreur);
															echo "<strong>Url du Livreur : </strong><a>" . $url . "</a><br></p>";
														}
														?>
		<script>

	

			// Get the button that opens the modal
			var btn = document.getElementById("myBtnAhmed<?php echo $n ?>");


			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("closeAhmed<?php echo $n ?>")[0];

			btn.onclick = function() {
							// Get the modal
			var modal = document.getElementById('myModalAhmed<?php echo $n ?>');
				modal.style.display = "block";
			



			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {

				modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}}
		</script>
														<?php
													}
													?>

										</tbody>

									</table>
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