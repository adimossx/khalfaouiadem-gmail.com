<?php
include "../../../entities/client.php";
include "../../../core/ClientC.php";

$Client1C=new ClientC();
$listeGouv=$Client1C->afficherGouvernerat();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Little Closet template">
   <!-- <link rel="stylesheet" href="../Projet/assets/Inscription.css">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Projet/assets/styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="../Projet/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="../Projet/assets/styles/inscri-login.css"> <!-- HERE******** -->

    <link rel="stylesheet" type="text/css" href="../Projet/assets/styles/checkout_responsive.css">


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>

<script>
    function nomVerify() {
        var regex = /^[a-zA-Z]{3,}/;
        var var1 = document.getElementById("checkout_name");

        if(!regex.test(var1.value))
   	    {
            var1.style.borderColor = "red" ;
            document.getElementById("textnom").innerHTML="*Saisir Votre Nom";
      	    return false;
   	    }
   	    else
   	    {
            var1.style.borderColor = "" ;
            document.getElementById("textnom").innerHTML="";
    	    return true;
   	    }
    }

    function prenomVerify() {
        var regex = /^[a-zA-Z]{3,}/;
        var var1 = document.getElementById("checkout_last_name");

        if(!regex.test(var1.value))
   	    {
            var1.style.borderColor = "red" ;
            document.getElementById("textprenom").innerHTML="*Saisir Votre Prénom";
      	    return false;
   	    }
   	    else
   	    {
            var1.style.borderColor = "" ;
            document.getElementById("textprenom").innerHTML="";
    	    return true;
   	    }
    }
    function emailVerify_blur(s1,s2) {
        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
        var var1 = document.getElementById("checkout_email");

        if (var1.value == "" || !regex.test(var1.value)) {
            var1.style.border = "1px solid #FF0000";
            document.getElementById("textemail").innerHTML="*Entrer un E-mail valide";
        }
       /* else {var1.style.border = "";
            document.getElementById("textemail").innerHTML="";
        }*/
        EmailEV(s1,s2);
    }
    function emailVerify(s1,s2) {
        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
        var var1 = document.getElementById("checkout_email");

        if (var1.value == "" || !regex.test(var1.value)) {
            var1.style.border = "1px solid #FF0000";
            document.getElementById("textemail").innerHTML="*Entrer un E-mail valide";
        }
        else {var1.style.border = "";
            document.getElementById("textemail").innerHTML="";
        }
        EmailEV(s1,s2);
    }
    function EmailEV(s1,s2) {
        var email = document.getElementById(s1).value;
        var old = document.getElementById(s2).innerHTML;
        //alert (old);
        $.ajax({
            cache:false,
            url: "Check_mail_bd.php",
            method: "POST",
            data: {
                email: email,
                old: old
            },
            success: function(data) {
               // alert('sucsess');
                $('#'+s2).html(data);
            }
        });

    }
    function mdpVerify() {
        var pass = document.getElementById("checkout_password");

        if (pass.value == "") {
            pass.style.border = "1px solid #FF0000";
            document.getElementById("textmdp").innerHTML = "*Entrer un mdp";
        } else {
            pass.style.border = "";
            document.getElementById("textmdp").innerHTML = "";
        }
    }

    function mdpcVerify() {
            var pass = document.getElementById("checkout_password");
            var pass2 = document.getElementById("checkout_password_confirm");

            if (pass2.value != pass.value) {
                pass2.style.border = "1px solid #FF0000";
                document.getElementById("textmdpc").innerHTML="*Wrong password";}

            else {pass2.style.border = "";
                document.getElementById("textmdpc").innerHTML="";}
    }

    function paysVerify() {
            var pass = document.getElementById("checkout_country");

            if (pass.value == "") {
                pass.style.border = "1px solid #FF0000";
                document.getElementById("textpays").innerHTML = "*Entrer un pays";
            } else {
                pass.style.border = "";
                document.getElementById("textpays").innerHTML = "";
            }
        }
    function adressVerify() {
        var pass = document.getElementById("checkout_address");

        if (pass.value == "") {
            pass.style.border = "1px solid #FF0000";
            document.getElementById("textadress").innerHTML = "*Entrer votre adress";
        } else {
            pass.style.border = "";
            document.getElementById("textadress").innerHTML = "";
        }
    }
    function codepostalVerify() {
        var pass = document.getElementById("checkout_zipcode");

        if (pass.value == "") {
            pass.style.border = "1px solid #FF0000";
            document.getElementById("textcodepostal").innerHTML = "*Entrer un code postal";
        } else {
            pass.style.border = "";
            document.getElementById("textcodepostal").innerHTML = "";
        }
    }
    function villeVerify() {
        var pass = document.getElementById("checkout_city");

        if (pass.value == "") {
            pass.style.border = "1px solid #FF0000";
            document.getElementById("textville").innerHTML = "*Entrer une ville";
        } else {
            pass.style.border = "";
            document.getElementById("textville").innerHTML = "";
        }
    }
    function phoneVerify() {
        var pass = document.getElementById("checkout_phone");

        if (pass.value == "") {
            pass.style.border = "1px solid #FF0000";
            document.getElementById("textphone").innerHTML = "*Entrer un Numero de téléphone";
        } else {
            pass.style.border = "";
            document.getElementById("textphone").innerHTML = "";
        }
    }

</script>

<!-- Menu -->

<div class="menu">

        <!-- Search -->
        <div class="menu_search">
            <form id="menu_search_form" class="menu_search_form">
                <input type="text" class="search_input" placeholder="Recherche..." required="required">
                <button class="menu_search_button"><img src="../Projet/assets/images/search.png" alt="icon recherche"></button>
            </form>
        </div>
        <!-- Navigation -->
        <div class="menu_nav">
            <ul>
            <li><a href="../index.php">Acceuil</a></li>
                <li><a href="../index.php#contact">Contact</a></li>
            </ul>
        </div>
        <!-- Contact Info -->
        <div class="menu_contact">
            <div class="menu_phone d-flex flex-row align-items-center justify-content-start">
                <div><div><img src="../Projet/assets/images/phone.svg" alt="Phone Icon"></div></div>
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
                    <a href="../index.php">
                        <div class="d-flex flex-row align-items-center justify-content-start">
                            <div><img src="../images/logo3.png" alt="Logo" width="140" height="auto" ></div>
                        </div>
                    </a>	
                </div>
                <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
                <nav class="main_nav">
                    <ul class="d-flex flex-row align-items-start justify-content-start">
                    <li><a href="../index.php">Acceuil</a></li>
                
                <li><a href="../index.php#contact">Contact</a></li>
                    </ul>
                </nav>
                <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
                    <!-- Search -->
                    <div class="header_search">
                        <form id="header_search_form">
                            <input type="text" class="search_input" placeholder="Recherche..."  disabled>
                            <button class="header_search_button" disabled><img src="../Projet/assets/images/search.png" alt="icon recherche"></button>
                        </form>
                    </div>
                    <!-- User -->
                    <div class="user"><a href="./login.php"><div><img src="../Projet/assets/images/user.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
                    <!-- Cart -->
                    <div class="cart"><a href="#"><div><img src="../Projet/assets/images/cart.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
                    <!-- Phone -->
                    <!-- <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                        <div><div><img src="../Projet/assets/images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
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
                    <div class="home_title">Inscription</div>
                    <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                        <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                            <!--<li><a href="../Projet/assets/#">Home</a></li>
                            <li>Checkouttt</li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout -->

        <div class="checkout">
            <div class="container">
                <div class="row">

                    <!-- Inscription -->
                    <div align="center" style="width:100%;" >
                        <div class="billing">
                            <div class="checkout_title">Inserer vos informations</div>
                            <div class="checkout_form_container">
                                <form action="./ajouterClient.php" method="post" id="checkout_form" class="checkout_form"  onsubmit="return submitUserForm();" >
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <!-- Name -->
                                            <input type="text" name="nom" id="checkout_name" class="checkout_input" placeholder="Nom" required="required" onblur="nomVerify()">
                                            <p id="textnom" class="ErrFah"></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <!-- Last Name -->
                                            <input type="text" name="prenom" id="checkout_last_name" class="checkout_input" placeholder="Prénom" required="required" onblur="prenomVerify()">
                                            <p id="textprenom" class="ErrFah"></p>
                                        </div>
                                    </div>
                                    <div >
                                            <!-- Last Name -->
                                            <input type="text" name="username" id="checkout_last_name" class="checkout_input" placeholder="username" required="required" onblur="prenomVerify()">
                                            <p id="textprenom" class="ErrFah"></p>
                                        </div>
                                    <div>
                                        <!-- Email -->
                                        <input type="email" name="email" id="checkout_email" class="checkout_input" placeholder="E-mail" required="required" onblur="emailVerify_blur(this.id,'textemail')" onkeyup="emailVerify(this.id,'textemail')">
                                        <p id="textemail" class="ErrFah"></p>
                                    </div>
                                    <div>
                                        <!-- Mdp -->
                                        <input type="password" name="password" id="checkout_password" class="checkout_input" placeholder="Mot de passe" required="required" onblur="mdpVerify()">
                                        <p id="textmdp" class="ErrFah"></p>
                                    </div>
                                    <div>
                                        <!-- Confirmer mdp -->
                                        <input type="password" id="checkout_password_confirm" class="checkout_input" placeholder="Confirmer Mot de Passe" required="required" onblur="mdpcVerify()">
                                        <p id="textmdpc" class="ErrFah"></p>
                                    </div>
                                    <div>
                                        <!-- City / Town -->
                                        <select class="checkout_input" name="select_City" id="select">
                                <?PHP
                                foreach($listeGouv as $row){
                                ?>
                                            <option><?php echo $row['gov']; ?></option>
                                <?php }
                                ?>
                                            </select>
                                    </div>

                                    <div>
                                        <!-- Phone no -->
                                        <input type="phone" id="checkout_phone" name="phone" class="checkout_input" placeholder="Numéro de téléphone" required="required" onblur="phoneVerify()">
                                        <p id="textphone" class="ErrFah"></p>
                                    </div>

                                    <div>
                                        <select class="checkout_input" name="profession" id="profession" onclick="profVerify()">
                                            <option value="votreprofession">Votre Profession</option>

                                            <?php
                                            $id_fichier = fopen("profession.txt","r");
                                                while($ligne = fgets($id_fichier,1024)) {
                                                    if(trim($ligne) == '')	continue;
                                                    $libelle = trim(substr($ligne, 0));
                                                    print '<option>'.$libelle.'</option>';
                                                }
                                            ?>

                                        </select>

                                    </div>
                                    
                                    <div class="g-recaptcha" data-sitekey="6LcQfqUUAAAAALh-bTX-CC8pBlAd_F1MwUuWqWgF" data-callback="verifyCaptcha"></div>
                                    <div id="g-recaptcha-error"></div>
                                    <script>
                                    function profVerify() {
                                        var pass = document.getElementById("profession");
                                        if (pass.value == "votreprofession") {
                                            
                                            pass.style.border = "1px solid #FF0000";
                                            document.getElementById("textville").innerHTML = "Choisir une Profession";
                                            
                                            return false;
                                        } else {
                                            pass.style.border = "";
                                            document.getElementById("textville").innerHTML = "";
                                            return true;
                                        }
                                    }

                                    function submitUserForm() {
                                        var response = grecaptcha.getResponse();
                                        var prof= profVerify();
                                        if ((response.length == 0) ) {
                                            document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">Champs Obligatoire !</span>';
                                            return false;
                                        }
                                        if(document.getElementById('textemail').innerHTML !== "")
                                        {
                                            return false;
                                        }
                                        return true;
                                    }
                                    
                                    function verifyCaptcha() {
                                        document.getElementById('g-recaptcha-error').innerHTML = '';
                                    }
                                    
                                    
                                    </script>
                                  <input class="btn btn-warning" type="submit" value="S'inscrire" >
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- Footer -->
                <footer class="footer">
                <div class="footer_content">
                    <div class="container">
                        <div class="row">

                            <!-- About -->
                            <div class="col-lg-4 footer_col">
                                <div class="footer_about">
                                    <div class="footer_logo">
                                        <a href="../index.php">
                                            <div class="d-flex flex-row align-items-center justify-content-start">
                                                <div class="footer_logo_icon"><img src="../images/logo3.png" alt="EnactusEsprit" width="200" height=auto></div>
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
                                        <!-- <li>
                                            <a href="../Projet/assets/#">
                                                <div>Customer Service<div class="footer_tag_1">online now</div>
                                                </div>
                                            </a> 
                                        </li> -->
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

                                    <div class="footer_social">

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

<script src="../Projet/assets/js/jquery-3.2.1.min.js"></script>
<script src="../Projet/assets/styles/bootstrap-4.1.2/popper.js"></script>
<script src="../Projet/assets/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="../Projet/assets/plugins/greensock/TweenMax.min.js"></script>
<script src="../Projet/assets/plugins/greensock/TimelineMax.min.js"></script>
<script src="../Projet/assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="../Projet/assets/plugins/greensock/animation.gsap.min.js"></script>
<script src="../Projet/assets/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="../Projet/assets/plugins/easing/easing.js"></script>
<script src="../Projet/assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="../Projet/assets/js/checkout.js"></script>
</body>
</html>