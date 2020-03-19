<?php
include "../../../Back Office ENACTUS/Les Modules/Gestion Commandes/php/core/Commandes.php";
include "../../../Back Office ENACTUS/Les Modules/Gestion produit/php/core/Produits.php";
include "../../../Back Office ENACTUS/Les Modules/Gestion Commandes/php/entities/Commande.php";
include "../../../../core/ClientC.php";
include "../../../../core/ProjetC.php";



session_start();
if ($_SESSION["login_in"]) {
	$idc = $_SESSION["ID"] ;
        $Projet1C = new ProjetC();
        $listeProjet = $Projet1C->afficherProjets();
        $Client1C = new ClientC();
        $r = $Client1C->recupererClient($_SESSION["ID"]);
        foreach ($r as $row) {
                $name = $row['pseudo'];
                $image = $row['image'];
                $adress=$row['Adresse'];
                $NumTel=$row['NumTel'];
                $nomm=$row['nom'];
                $prenom=$row['prenom'];
                $mail=$row['mail'];
            }
$totalPanier=$_POST['Total_Panierez'];
        $test_check = $_POST['test_check'];
?>

<?php
$NomPlace="Panier";
$sql="SELECT * from Banniere ";
$db = config::getConnexion();
$resultBan=$db->query($sql);
$img="default.gif";
$n="ParDefaut";  
$url="";
foreach($resultBan as $rowB){
    $id=$rowB['id'];
    $nom=$rowB['Nom'];
    $espace=$rowB['espaceBanniereProjet'];
    $dateD=$rowB['dateDebut'];
    $dateF=$rowB['dateFin'];
    $dateA=$rowB['dateAjout'];
    $url=$rowB['lienURL'];
    $desc=$rowB['description'];
	$cheminImage=$rowB['image'];
    $dateActuel=date("Y-m-d");

	if (($dateActuel >= $dateD) and ($dateActuel < $dateF))
	{
		$sql1="SELECT * FROM espacebanniereprojet ";
		$db1 = config::getConnexion();
		$result1=$db1->query($sql1);
		$numP=0;
		foreach($result1 as $row1){
            
			$idP=$row1['id'];
			$nomP=$row1['NomProjet'];
            $numP=$row1['NumProjet'];
        }
        if($espace==$NomPlace)
        {
            $img=$cheminImage;
            $n=$nom;
            break;
        }
        else
        {
            $img="default.gif";
            $n="ParDefaut";  
            $url="";
        }
	}
	else
	{
		$img="default.gif";
		$n="ParDefaut";  
		$url="";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>Espace Paiement</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../assets/styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="../assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../assets/styles/checkout.css">
<link rel="stylesheet" type="text/css" href="../assets/styles/checkout_responsive.css">
</head>
<body>

<!-- Menu -->

<div class="menu">

	<!-- Search -->
	<div class="menu_search">
		<form action="#" id="menu_search_form" class="menu_search_form">
			<input type="text" class="search_input" placeholder="Recherche..." required="required">
			<button class="menu_search_button"><img src="../assets/images/search.png" alt="icon recherche"></button>
		</form>
	</div>
	<!-- Navigation -->
	<div class="menu_nav">
		<ul>
		<li><a href="../indexClient.php">ENACTUS ICT</a></li>
			<li><a href="../indexClient.php#contact">Contact</a></li>
		</ul>
	</div>
	<!-- Contact Info -->
	<div class="menu_contact">
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><img src="../assets/images/phone.svg" alt="Phone Icon"></div></div>
			<div>+216 55 685 313</div>
		</div>
		<div class="menu_social">
			<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
						<li><a href="https://www.facebook.com/EnactusEsprit/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="https://www.youtube.com/channel/UCRib0DyzRo01IzvIa5y0-qg"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                                <li><a href="https://www.instagram.com/enactus_esprit_ict/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="super_container">

	<!-- Header -->
	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href="../indexClient.php">
					<div class="d-flex flex-row align-items-center justify-content-start">
					<div><img src="../../images/logo3.png" alt="ENACTUS ICT" width="140" height=auto></div>
					</div>
				</a>	
			</div>
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
				<li><a href="../indexClient.php">ENACTUS ICT</a></li>
			<li><a href="../indexClient.php#contact">Contact</a></li>
				</ul>
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				<div class="header_search">
					<form action="#" id="header_search_form">
						<input type="text" class="search_input" placeholder="Recherche..." required="required" disabled>
						<button class="header_search_button"><img src="../assets/images/search.png" alt="icon recherche"></button>
					</form>
				</div>
				<!-- User -->
				<div class="user"><a href="../EspaceClient/ProfilClient-Informations.php">
                                <div><img src="../assets/images/user.svg" alt="https://www.flaticon.com/authors/freepik"></div>
                            </a></div>
				<!-- Cart -->
				<div class="cart"><a href="./cart.php"><div><img src="../assets/images/cart.svg" alt="https://www.flaticon.com/authors/freepik">
				<?php
                                    $sqles="SELECT count(*) as totc from panier where ID_Client='$idc' ";
                                    $db = config::getConnexion();
                                    $resse=$db->query($sqles);
                                    foreach($resse as $rr)
                                    {
                                        $totcaat=$rr['totc'];
                                    }
                                    ?>
                                    <div><?php echo $totcaat; ?></div>
                                </div>
                            </a></div>
				<!-- Phone -->
				<!-- <div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><img src="../assets/images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
					<div>+216 55 685 313</div>
				</div> -->
			</div>
		</div>
	</header>

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<!-- <img src="../assets/aa.jpg" alt="" height="5" width=auto> -->
					<div class="home_title" > Espace Paiement </div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li>Acceuil</li>
							<li>Espace Paiement</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
                <!-- PUB -->
                <style>
                .container1, .container2, .container3 {
                    font-family: 'Helvetica', Calibri, sans-serif;
                    font-size: 20px;
                    font-weight: bold;
                    text-align: center;
                    line-height: 4;
                }
                .container1 a, .container2 a, .container3 a, .container1 a:visited, .container2 a:visited, .container3 a:visited {
                    color: #000;
                }
                .container1 .banner, .container1 .phrase-1, .container1 .phrase-2 {
                    -webkit-transition: all ease 1s;
                    -moz-transition: all ease 1s;
                    -o-transition: all ease 1s;
                    -ms-transition: all ease 1s;
                    transition: all ease 1s;
                }
                .container1 .banner {
                    width: 70%;
                    height: 75px;
                    margin: 20px auto;
                    overflow: hidden;
                    background-color: #DDDDDD;
                    position: relative;
                }

                </style>
                <div align="center" name="Banniere">
                    <div class="container1">
                    <div class="banner">
                    <img src="../../../Back Office ENACTUS/Les Modules/Markenting - Banniere/ImageBanniereUpload/<?php echo $img ?>" alt="Banniere">
                    </div>
                    </div>
                </div>
		<!-- Checkout -->
		<div class="checkout">
			<div class="container">
				<div class="row">
					
					<!-- Billing -->
					<div class="col-lg-6">
						<div class="billing">
							<div class="checkout_title">DÉTAILS DE LA FACTURATION</div>
							<div class="checkout_form_container">
								<form action="#" id="checkout_form" class="checkout_form" name="checkout">
									<div class="row">
										<div class="col-lg-6">
                                            <!-- Name -->
                                            <input type="text" id="checkout_name" class="checkout_input" placeholder="Nom" value="<?php echo $nomm;?>" disabled="disabled" readonly>
                                        </div>
                                        <div class="col-lg-6">
                                            <!-- Last Name -->
                                            <input type="text" id="checkout_last_name" class="checkout_input" placeholder="Prénom" value="<?php echo $prenom;?>" disabled="disabled" readonly>
                                        </div>
                                    </div>


                                    <div>
                                        <!-- Address -->
                                        <input type="text" id="checkout_address" class="checkout_input" placeholder="Adresse 1" value="<?php echo $adress;?>" disabled="disabled" readonly>
                                    </div>


                                    <div>
                                        <!-- Phone no -->
                                        <input type="phone" id="checkout_phone" class="checkout_input" placeholder="Numéro de Télephone" value="<?php echo $NumTel;?>" disabled="disabled" readonly>
                                    </div>
                                    <div>
                                        <!-- Email -->
                                        <input type="email" id="checkout_email" class="checkout_input" placeholder="Email" value="<?php echo $mail;?>" disabled="disabled" readonly>
                                    </div>

								</form>
							</div>
						</div>
					</div>

					<!-- Cart Total -->
					<div class="col-lg-6 cart_col">
						<div class="cart_total">
							<div class="cart_extra_content cart_extra_total">
                            <form method="POST" action="confirmer_achat.php" id="chek_form">
                                <div class="checkout_title">Total Panier</div>
                                <ul class="cart_extra_total_list">
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Panier</div>
                                        <div class="cart_extra_total_value ml-auto"><input type="text" name="totalpanier" style="text-align: right;margin-left: 133px;width: 40%;background:transparent; border:none;" readonly value=" <?php echo $totalPanier; ?>"> TND</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Frais de livraison</div>
                                        <div class="cart_extra_total_value ml-auto">Gratuit</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Total</div>
                                        <div class="cart_extra_total_value ml-auto"><?php echo $totalPanier; ?> TND</div>
                                    </li>
                                </ul>
								<div class="payment_options">
									<div class="checkout_title">MÉTHODE DE PAIEMENT</div>
									<ul>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_2" name="payment_radio" class="payment_radio" value="Paiement en Especes" checked>
												<span class="radio_mark"></span>
												<span class="radio_text">Paiement en Espèces </span>
											</label>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_3" name="payment_radio" class="payment_radio" value="Paiement par Cheque" >
												<span class="radio_mark"></span>
												<span class="radio_text">Paiement par Chéque</span>
											</label>
										</li>
									</ul>
								</div>
								<div class="cart_text">
									<p>cher(e) client(e) afin de valider votre commande veuillez appeler notre service commercial: tel: 12 34 56 78 / 12 34 56 78 durant nos horaires de travail.
										<br>Sans votre validation téléphonique la commande ne sera pas traitée.</p>
										<select class="dropdown_item_select checkout_input" require="required" name="nomLivreur"  >


										<?php
										include "LivreurC.php";
										$livreurC=new LivreurC();
										$result=$livreurC->recupererNomLivreur();


										while ($row = $result->fetch_assoc()) {
										echo "<option>".$row['nom']."</option>";

										
										}
										


										?>


										</select>
										<?php
								
								$result2=$livreurC->recupererDescLivreur();
											echo "<div class='cart_text'>";
											while ($row2 = $result2->fetch_assoc()  ) {
												$mavariable = utf8_encode($row2['description']);

			          						echo "*".$row2['nom'] .": ".$mavariable ."<br>" ;

			          						echo "<br>" ;
			          						}
			          						echo "</div>";

								?>
								<br>

								<div>
									
									<textarea  type="text" name="designation" placeholder="Remarques pour la livraison" class="checkout_input"></textarea>

								</div>
                                </div>
								<!-- <div >Confirmer l'achat  -->
								<?php 
								$Paniers=new Paniers();
									$result=$Paniers->recupererPanier($_SESSION["ID"]);
									$PDO='';
									foreach($result as $keyr)
									{
										$PDO=$PDO.$keyr['ID_Produit']."|".$keyr['Quantite']."#";
									}
									// $PDO=substr($PDO,0,-1);
								?>
                                <input type="hidden" name="PDO" value="<?php echo $PDO;?>"  >
                                <input type="hidden" value="<?php echo $_SESSION["ID"] ;?>" name="id_client_checkout" >
                                <input type="hidden" value="<?php echo $test_check?>" name="test_ck">
                                <button type="button" id="tp_submit" class="btn btn-warning" style="width:100%;" form="checkout" value="ConfirmerAchat" onclick="myf()" >Confirmer l'achat</button>
                            
							</div>
						</div>
                    </div>
                    </form>
				</div>
			</div>
		</div>

        <script>
            function myf(){
                $("#chek_form").submit();
            }
        </script>
		<!-- Footer -->

		<footer class="footer">
			<div class="footer_content">
				<div class="container">
					<div class="row">
						
						<!-- About -->
						<div class="col-lg-4 footer_col">
							<div class="footer_about">
								<div class="footer_logo">
									<a href="../indexClient.php">
										<div class="d-flex flex-row align-items-center justify-content-start">
										<div><img src="../../images/logo3.png" alt="ENACTUS ICT" width="300" height=auto></div>
										</div>
									</a>		
								</div>
							</div>
						</div>

						<!-- Footer Links -->
						<div class="col-lg-4 footer_col">
							<div class="footer_menu">
								<div class="footer_title">Déscription</div>
								<ul class="footer_list">
										<li>
                                                    <div>ENACTUS est une organisation non gouvernementale internationale à but non lucratif, créée en 1975 aux USA.</div>
                                            </li>
								</ul>
							</div>
						</div>

						<!-- Footer Contact -->
						<div class="col-lg-4 footer_col">
							<div class="footer_contact">
								<div class="footer_title">Abonnez Vous !</div>
								<div class="newsletter">
											<form action="../../Add@News.php" method="POST" id="newsletter_form" class="newsletter_form">
                                                <input type="email" class="newsletter_input" name="emailNewsInput" placeholder="Votre Email..." required="required">
                                                <button type="submit" value="ajouter" name="ajouter" class="newsletter_button">+</button>
									        </form>
								</div>
								<div class="footer_social">
									<div class="footer_title">Social</div>
									<ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
												<li><a href="https://www.facebook.com/EnactusEsprit/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="https://www.youtube.com/channel/UCRib0DyzRo01IzvIa5y0-qg"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                                <li><a href="https://www.instagram.com/enactus_esprit_ict/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer_bar">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
								<div class="copyright order-md-1 order-2">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made by WASP</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>

<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/styles/bootstrap-4.1.2/popper.js"></script>
<script src="../assets/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="../assets/plugins/greensock/TweenMax.min.js"></script>
<script src="../assets/plugins/greensock/TimelineMax.min.js"></script>
<script src="../assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="../assets/plugins/greensock/animation.gsap.min.js"></script>
<script src="../assets/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="../assets/plugins/easing/easing.js"></script>
<script src="../assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="../assets/js/checkout.js"></script>

</body>
<?php }
else
{
	header("Location:../../login/login.php");
} ?>
</html>