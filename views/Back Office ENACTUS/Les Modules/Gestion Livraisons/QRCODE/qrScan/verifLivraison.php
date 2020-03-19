<?php
include "../../core/livraisonC.php";

if (isset($_GET['id'])  )
{	echo "Bonjour ";$somme=$_GET['id'] ;

$data = $somme;    
$code = substr($data, strpos($data, "|") + 1);
$id = substr($data,0, strpos($data, "|") );    
echo $code;
echo $id;
$livraison1C=new livraisonC();
$etat=$livraison1C->recupererEtatLivraison($id);
//$dateDebut=$livraison1C->recupererDatetDebutLivraison($id);
//$dateFin=$livraison1C->recupererDatetFinLivraison($id);
	$dbhandle= new mysqli('localhost','root','','bweb');
echo $dbhandle->connect_error;

if ($etat=="confirme"  )
{
$sql="	UPDATE `livraison` SET `etat`='encours' ,`dateDebutLiv`=now() WHERE `id`=$id ";
$result=$dbhandle->query($sql);
}
elseif ($etat=="encours"  ) {
	$sql="	UPDATE `livraison` SET `etat`='livre' ,`dateFinLiv`=now() WHERE `id`=$id ";
$result=$dbhandle->query($sql);
}
$sql2="	UPDATE `livraison` SET `codeLiv`='$code'  WHERE `id`=$id ";
$result2=$dbhandle->query($sql2);
}
?>