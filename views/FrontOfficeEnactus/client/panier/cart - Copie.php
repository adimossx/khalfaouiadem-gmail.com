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
            }
    $sqle="SELECT * from pointsclients where IDClient='$idc' ";
    $db = config::getConnexion();
    $ress=$db->query($sqle);
        foreach ($ress as $row1)
        {
            $pf = $row1['PointProdC'];
        }

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

    <head>
        <title>Votre Panier</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Little Closet template">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../assets/styles/bootstrap-4.1.2/bootstrap.min.css">
        <link href="../assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../assets/styles/cart.css">
        <link rel="stylesheet" type="text/css" href="../assets/styles/cart_responsive.css">
        <link href="../../../Back%20Office%20ENACTUS/Les%20Modules/gestion%20produit/php/views/AfficherProduitCss.css" rel="stylesheet" />


    </head>

    <body>
    <!-- -->

    <script src="../../../Back Office ENACTUS/Les Modules/gestion produit/AProduitJs.js"></script>
    <script src="../../../Back Office ENACTUS/Les Modules/gestion produit/ImageJS.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- -->

            
        <!-- Menu -->

        <div class="menu">

            <!-- Search -->
            <div class="menu_search">
                <form action="#" id="menu_search_form" class="menu_search_form">
                    <input type="text" class="search_input" placeholder="Recherche..."  >
                    <button class="menu_search_button" ><img src="../assets/images/search.png" alt="icon recherche"></button>
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
                    <div>
                        <div><img src="../assets/images/phone.svg" alt="Phone Icon"></div>
                    </div>
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
                        <div class="cart"><a href="#">
                                <div><img src="../assets/images/cart.svg" alt="https://www.flaticon.com/authors/freepik">
                                
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
                            <div class="home_title">Panier</div>
                            <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                                <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                                    <li><a href="../assets/index.html"></a>Acceuil</li>
                                    <li>Votre panier</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <style> input[type=number]::-webkit-inner-spin-button,
                    input[type=number]::-webkit-outer-spin-button {
                        opacity: 1;}
                    input[type="number"], input[type="text"], textarea, select {
                        outline: none;
                        color: transparent;
                        text-shadow: 0 0 0 black;}
                    .QQQ{
                        width:60px;
                        height: 27px;
                        border: none;
                        text-align-last: center;
                    }
                </style>
                <!-- Cart -->

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
                <div class="cart_section">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="cart_container">

                                    <!-- Cart Bar -->
                                    <div class="cart_bar">
                                        <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                                            <li class="mr-auto">Produits</li>
                                            <!--<li>Couleur</li>
                                            <li>Taille</li>-->
                                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prix</li>
                                            <li>&nbsp;&nbsp;&nbsp;&nbsp;Quantité</li>
                                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total</li>
                                            <li>&nbsp;Supprimer</li>
                                        </ul>
                                    </div>
<?php
$panierC=new Paniers();
$listePanier=$panierC->recupererPanier($_SESSION["ID"]);
$i=0;
$totals=0;
$PDC="";
foreach ($listePanier as $key)
{$i++;
    $produitC=new Produits();
$listeProduit=$produitC->recupererProduit($key['ID_Produit']);
foreach ($listeProduit as $here)
{
?>
        <script>

									function myfunc3(reff, idp) {
										//var alr = document.getElementById('test').value ;
                                        //alert('tre');
										//alert(reff+idp);
										var fah = reff; // =zzz
										var fahh = idp;
										//var fah =document.getElementById('test').value;
										//$.post('upload.php',{postref:fah},function (data) {$('#result').html(data)});
										$.ajax({
                                            cache:false,
											url: "upload4.php",
											method: "POST",
											//data: 'nome='+fah,
											data: {
												nomee: fahh,
												nome: fah
											},
											success: function(data) {

												// $('#test').html(data);
												//$().html(data);
												//document.getElementById(s1).innerHTML(data);
												//s1.html(data);
												//$(#s1).html(data);
												$('#'+'B'+fah).html(data);
												//alert ('success');
											}
										});
									}

                                    
		</script>
<!--  tebda houni--><form action="checkout.php" method="POST">
                                        <!-- Cart Items -->
                                        <div class="cart_items">
                                            <ul class="cart_items_list">

                                                <!-- Cart Item -->
                                                <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                                    <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                                        <div>
                                                            <div class="product_number"><?php echo $i ;?></div>
                                                            <input type="hidden" id="WTF">
                                                        </div>
                                                        <div>
                                                            <div class="product_image" id="B<?PHP echo $here['reference']; ?>">

                                                                <script>
                                                                    myfunc3("<?PHP echo $here['reference']; ?>","<?PHP echo $key['ID_Projet']; ?>");
                                                                </script>
                                                            </div>
                                                        </div>



                                                        <div class="product_name_container">
                                                            <div class="product_name"><a href="../projet/MODAL/product1.php?reference=<?PHP echo $here['reference']; ?>&idprojet=<?PHP echo $key['ID_Projet']; ?>"><?php echo $here['nom'];?></a></div>
                                                            <div class="product_text"><?php echo $here['categorie'];?></div>

                                                        </div>
                                                    </div>
                                                    <!--<div class="product_color product_text"><span>Color: </span>beige</div>
                                                    <div class="product_size product_text"><span>Size: </span>L</div>-->
                                                    <div class="product_price product_text"><span>Price: </span><?php echo $here['prix'];?>&nbsp;DT</div>
                                                    <div class="product_quantity_container">
                                                        <div class="product_quantity ml-lg-auto mr-lg-auto text-center">
                                                            <!-- <span class="product_text product_num">1</span>
                                                             <div class="qty_sub qty_button trans_200 text-center"><span>-</span></div>
                                                             <div class="qty_add qty_button trans_200 text-center"><span>+</span></div>-->
                                                            <input type="number" min="1" class="QQQ" name="QUANTITEES" value="<?php echo $key['Quantite'];?>" id="Quantite_<?PHP echo $here['reference']; ?>"  onclick="myfunc5(<?php echo $key['ID_Panier'];?>,this.value,'<?PHP echo 'total_'.$here['reference'];?>',<?php echo $here['prix'];?>,<?php echo $key['Quantite'];?>)" onkeyup="myfunc5(<?php echo $key['ID_Panier'];?>,this.value,'<?PHP echo 'total_'.$here['reference'];?>',<?php echo $here['prix'];?>,<?php echo $key['Quantite'];?>)">
                                                        </div>


                                                        <input type="hidden" name="FRE" value="<?PHP echo $here['reference'];?>">

                                                    </div>
                                                    <?php //$total=$key['Quantite']*$here['prix'];?>

                                                    <div class="product_total product_text" "><span></span><input type="text" id="total_<?PHP echo $here['reference'];?>" value="<?php $total=$key['Quantite']*$here['prix'];echo $total;?>" style="width: 115px;border: none" readonly> DT</div>
                                        <a  href="supprimerPanier.php?ID_Panier=<?PHP echo $key['ID_Panier'];?>" title="" class="btn tooltip-link product-edit">
                                            <i class="material-icons action-enabled">clear</i></a>
                                        </li>
                                        </ul>
                                </div>
                                <?php $totals=$totals + ($key['Quantite']*$here['prix']);?>

                                <!-- toufa houni -->
                                <?php } } ?>

                                <!-- Cart Buttons -->
                                <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                                    <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                        <div class="button button_clear trans_200"><a href="ViderPanier.php?ID_Panier=<?PHP echo $_SESSION['ID'];?>">Vider le panier</a></div>
                                        <div class="button button_continue trans_200"><a href="../indexClient.php#work">Continuer le Shopping</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row cart_extra_row">
                        <div class="col-lg-6">
                            <div class="cart_extra cart_extra_1">
                                <div class="cart_extra_content cart_extra_coupon">
                                    <div class="cart_extra_title">La Confirmation de La Commande</div>
                                    <div class="coupon_text">
                                        Votre Commande ne sera confirmer que lors de l'envoi du mail et la comunication téléphonique
                                        Votre Commande ne sera confirmer que lors de l'envoi du mail et la comunication téléphonique
                                        Votre Commande ne sera confirmer que lors de l'envoi du mail et la comunication téléphonique
                                        Votre Commande ne sera confirmer que lors de l'envoi du mail et la comunication téléphonique
                                        Votre Commande ne sera confirmer que lors de l'envoi du mail et la comunication téléphonique
                                        Votre Commande ne sera confirmer que lors de l'envoi du mail et la comunication téléphonique
                                        Votre Commande ne sera confirmer que lors de l'envoi du mail et la comunication téléphonique
                                        Votre Commande ne sera confirmer que lors de l'envoi du mail et la comunication téléphonique
                                        Votre Commande ne sera confirmer que lors de l'envoi du mail et la comunication téléphonique
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 cart_extra_col">
                            <div class="cart_extra cart_extra_2">
                                <div class="cart_extra_content cart_extra_total">

                                    <div class="cart_extra_title">Total du panier</div>
                                    <ul class="cart_extra_total_list">
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="cart_extra_total_title">Total avant livraison</div>
                                            <div class="cart_extra_total_value ml-auto"><input type="text" name="Total_Panier" id="Total_Panier" value="<?php echo $totals; ?>" style="text-align: right;width: 115px;border: none;background:transparent;" readonly> DT</div>
                                        </li>
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="cart_extra_total_title">Vos Points de fidelites</div>
                                            <div class="cart_extra_total_value ml-auto"><?php echo $pf;?></div>
                                        </li>

                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <input type="checkbox" id="check_pf" name="payment_radio" class="payment_radio" value="Paiement en Especes" onclick="Func_pf(this.id)">
                                            <!-- <span class="radio_mark"></span>-->
                                            <span class="cart_extra_total_title" >&nbsp;&nbsp;Utiliser mes points </span>
                                        </li>

                                        <!--<label class="radio_container">
                                            <input type="checkbox" id="radio" name="payment_radio" class="payment_radio" value="Paiement en Especes" >
                                            <span class="radio_mark"></span>
                                            <span class="radio_text">Paiement en Espèces </span>
                                        </label>
                                        <br><br>-->
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="cart_extra_total_title">Total TTC</div>
                                            <div class="cart_extra_total_value ml-auto"><input type="text"   name="Total_Panierez" id="Total_Panierez" value="<?php echo $totals; ?>" style="text-align: right;font-weight: bolder;width: 115px;border: none;background:transparent;" readonly> DT</div>
                                        <input type="hidden" id ="test_check" name="test_check" value="0">
                                        </li>
                                    </ul>
                                    <div class="checkout_button trans_200"> <button type="submit" class="coupon_button" style="width: 100%;">proceder au paiement</button> </div>
                                    </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <script>
                var test=0;
                function Func_pf(s1) {
                    var checkbox = document.getElementById(s1);
                    //alert(document.getElementById('Total_Panier').value);
                    if (document.getElementById('Total_Panier').value != 0) {
                        var total_panier = document.getElementById('Total_Panierez');
                        total_TTC = total_panier.value;

                        var Remise = 0;
                        R =<?php echo $pf;?>;
                        Remise_value = R / 1000;
                        if (checkbox.checked == true) {
                            tTTC =document.getElementById('Total_Panierez').value;
                            //alert(tTTC);
                            Remise = total_TTC - Remise_value;
                            if (Remise>=0)
                            {document.getElementById('Total_Panierez').value = Remise;}
                            else {
                            document.getElementById('Total_Panierez').value =0;
                            test=1;
                            }
                            document.getElementById('test_check').value = '1';
                        } else {
                             // alert(test);
                            //alert(total_TTC+'   '+Remise_value);
                            Remise = parseFloat(+total_TTC + +Remise_value);
                            if(test==0){
                            document.getElementById('Total_Panierez').value = Remise;}
                            else if (test==1)
                            {
                                document.getElementById('Total_Panierez').value = document.getElementById('Total_Panier').value;}
                            document.getElementById('test_check').value = '0';
                        }
                    }
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
                                                    <div class="footer_logo_icon"><img src="../../images/logo3.png" alt="ENACTUS ICT" width="300" height=auto></div>
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
                                            Copyright &copy;<script>
                                                document.write(new Date().getFullYear());
                                            </script> All rights reserved | This template is made by WASP</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

        </div>

    <script>

        /*$(document).on('change', '#QQ', function(){
            alert("1");
            //var Quantite = document.getElementById('QQ').value ;
            //var id = document.getElementById('').value ;
                $.ajax({

                    //async:true,
                    url:"Quantite_Refresh.php",
                    method:"POST",
                    //data:{Quantite:Quantite,id:id},
                    cache:false,
                    success:function(data)
                    {
                        alert("2");
                        //$('#employee_table').html(data);
                    }
                })


        });*/
       //  $(document).ready(function() {

       /*$(document).on('change', '#Q', function () {
           alert("1");
           //var Quantite = document.getElementById('QQ').value ;
           //var id = document.getElementById('').value ;
           $.ajax({

               //async:true,
               url: "Quantite_Refresh.php",
               method: "POST",
               //data:{Quantite:Quantite,id:id},
               cache: false,
               success: function (data) {
                   alert("2");
                   //$('#employee_table').html(data);
               }
           })
       });*/
       //});
        function myfunc5(a,b,c,d,old_q)
        { //var thisdotvalue = document.getElementById(b).value;
        //if (thisdotvalue ==""){thisdotvalue=0;}
            //var fahh = '1';
            //var fah = 7;
            //if (b==""){b="0";}
            //alert (b+' : new quantite '+old_q+' : old_ quantite'+d+' : Prix '+' hethika : ');
            var x = (b*d) - parseFloat(document.getElementById(c).value);
            var tote =parseFloat(document.getElementById('Total_Panier').value) + x  ;
            document.getElementById('Total_Panier').value = tote.toFixed(3);

            var checkbox = document.getElementById('check_pf');
            var R=<?php echo $pf;?>;
            var RR = R / 1000;
            if(checkbox.checked == true)
            {//alert('1');
                document.getElementById('Total_Panierez').value = tote.toFixed(3) - RR;
            }
            else {
                document.getElementById('Total_Panierez').value = tote.toFixed(3);
               // alert('2');
            }

            var tot=parseFloat(d*b);
            document.getElementById(c).value=tot.toFixed(3);
           // alert(c);
            //var Quantite = document.getElementById('QQ').value ;
            //var id = document.getElementById('').value ;
            $.ajax({

                url: "Quantite_Refresh.php",
                method: "POST",
                //data: 'nome='+fah,
                data: {
                    nomee: a,
                    nome: b
                },
                success: function (data) {
                   // alert("2");
                    $('#WTF').html(data);
                }
            })
        }
          $(document).ready(function() {

         $(document).on('click', '.Q', function () {
             var fahh = '1';
             var fah = 7;
             //alert("1");
             //var Quantite = document.getElementById('QQ').value ;
             //var id = document.getElementById('').value ;
             $.ajax({
                 cache:false,
                 url: "Quantite_Refresh.php",
                 method: "POST",
                 //data: 'nome='+fah,
                 data: {
                     nomee: fahh,
                     nome: fah
                 },
                 success: function (data) {
                       //alert("2");
                     //$('#WTF').html(data);
                 }
             })
         });
        });
        </script>

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
        <script src="../assets/js/cart.js"></script>
    </body>
    <?php }
else
{
	header("Location:../../login/login.php");
} ?>
    </html>

