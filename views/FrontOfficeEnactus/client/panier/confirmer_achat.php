<?php

include "../../../Back Office ENACTUS/Les Modules/Gestion Commandes/php/core/Commandes.php";
include "../../../Back Office ENACTUS/Les Modules/Gestion Commandes/php/entities/Commande.php";
include "../../../Back Office ENACTUS/Les Modules/Gestion Livraisons/entities/livraison.php";
include "../../../Back Office ENACTUS/Les Modules/Gestion Livraisons/core/livraisonC.php";
include "../../../Back Office ENACTUS/Les Modules/gestion produit/php/core/Produits.php";

require "../assets/pdfFacture/fpdf.php";
/*

if (isset($_POST['reference']) and isset($_POST['nom_client']) and isset($_POST['type_client']) and isset($_POST['prix_total']) and isset($_POST['paiment']) and isset($_POST['etat']) and isset($_POST['date']) and isset($_POST['description']) ){
    $Commande=new Commande($_POST['reference'],$_POST['nom_client'],$_POST['type_client'],$_POST['prix_total'],$_POST['paiment'],$_POST['etat'],$_POST['date'],$_POST['description']);
    //$Categorie=new Categorie($_POST['categorie']);

//var_dump($Produit);
var_dump($Commande);

    $Commandes=new Commandes();
   // $Categories=new Categories();
    $Commandes->ajouterCommandes($Commande);
   // $Categories->ajouterCategories($Categorie);

     header("Location: afficherCommande.php");
}else{
    echo "vérifier les champs";
}
*/


if (isset($_POST['id_client_checkout']) && isset($_POST['nomLivreur'])) {
$var = $_POST['id_client_checkout'] ;
$var2 = $_POST['totalpanier'] ;
$var3 = $_POST['PDO'] ;
$Meth_paiment=$_POST['payment_radio'];

/* pf hechem */
$test_CHECKS = $_POST['test_ck'];
if ($test_CHECKS == '1')
{
    $sqle="UPDATE pointsclients SET PointProdC=0 where IDClient='$var' ";
    $db = config2::getConnexion();
    $db->query($sqle);
}
    /* !pf hechem */
print_r($_POST);
    $sql="SELECT * from client where ID='$var' ";

    $db = config2::getConnexion();
    try{
        $liste=$db->query($sql);
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
foreach ( $liste as $row){
$nom_client = $row['nom'];
}
echo $nom_client;

    $Commande=new Commande($var3,$nom_client,$var,$var2,$Meth_paiment,'Nouvelle Commande',date('Y-m-d'),'  ');
    //$Categorie=new Categorie($_POST['categorie']);
//var_dump($Produit);
    $Commandes=new Commandes();
   // $Categories=new Categories();
    $Commandes->ajouterCommandes($Commande);
   // $Categories->ajouterCategories($Categorie);

    // header("Location: afficherCommande.php");
    var_dump($Commande);

    $Paniers = new Paniers();
    $Paniers->supprimerPaniers_apres_commande($var);

    $produits= new Produits();

    $numPipe = substr_count($var3,"|");
    $numHash = substr_count($var3,"#");
    
    
    //echo "numero PIPE :".$numPipe;
    //echo "numero HASH :".$numHash;
    $j=0; 
    for ($i=0;$i<$numPipe;$i++) {
    
        $separation = strpos($var3, "|");
        $separation2 = strpos($var3, "#");
        //echo '<br>';
        //echo "first seperation pipe" . $separation; // == 6
        //echo '<br>';
        //echo "first seperation hash" . $separation2; // == 9
    
        $refP = substr($var3, 0, $separation);
        $quatP = substr($var3, $separation + 1, $separation2 - $separation - 1);
    
        $Paniers->Refresh_Quantite_Base($refP,$quatP);
        $produits->Quantite_V($refP,$quatP);

        //echo '<br>';
        //echo "first ref    :     " . $refP;
        //echo '<br>';
        //echo "first quant  :    " . $quatP;
    
        $len=strlen($var3);
        $var3 = substr($var3,$separation2+1,$len);
        //echo '<br>';
        //echo 'SUPRESSION : '.$var3;

        //$Produits=new Produits();

        $idp=$produits->recupererIdProduit($refP);


        $tabProduit[$j]=$idp; 
        $tabQProduit[$i]=$quatP;
        $j=$j+1;
    }



    $sql="SELECT * from commande where nom_client='$nom_client' ORDER BY id asc ";

    $db = config2::getConnexion();
    try{
        $list=$db->query($sql);
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
    foreach ( $list as $key){
        $id_commande = $key['id'];
        }


        include '../../../Back Office ENACTUS/Les Modules/Gestion Point Fidelite/PointsProduits/core/PointsProduitsC.php';
        include '../../../Back Office ENACTUS/Les Modules/Gestion Point Fidelite/PointsClients/core/PointsClientsC.php';
        $pfC=new PointsProduitsC();
        $pfClient=new PointsClientsC();
        $l=sizeof($tabProduit);
        //echo "length tableau ".$l;
        $somme=0;
       for ($i=0;$i<$l;$i++)
       { // ajouter if tableau feragh
       $pfProduit=$pfC->recupererPointsProduit($tabProduit[$i]);
       $somme+=$pfProduit*$tabQProduit[$i];
       }
       $pfClient->affecterPoints($somme,$var);
       
       //echo "Hello".$somme ;


        // echo $id_commande;

// echo $_POST['nomLivreur'];
$livraison1=new livraison($id_commande,$var, "confirme" ,$_POST['designation'],$_POST['nomLivreur']) ;
$livraison1C=new livraisonC();

$livraison1C->ajouterLivraison($livraison1);
$id=$livraison1C->recupererDernierId();
include '../../../Back Office ENACTUS/Les Modules/Gestion Livraisons/QRCODE/qrCode.php';
include '../../../Back Office ENACTUS/Les Modules/Gestion Livraisons/confirmerAchatClientMail.php';
include '../../../Back Office ENACTUS/Les Modules/Gestion Livraisons/confirmerAchatAdminMail.php';

//header('Location: ../assets/pdfFacture/creatPDF.php?IDCommande='.$id_commande);
header('Location: ../assets/pdfFacture/creatPDF.php?IDCommande='.$id_commande);


}
?>


