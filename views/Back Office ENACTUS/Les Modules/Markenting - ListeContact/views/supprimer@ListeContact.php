<?PHP
include "../core/ListeContactC.php";
$ListeContactC=new ListeContactC();
if (isset($_GET['id'],$_GET['Nom'],$_GET['idt'])){
	$id=$_GET['id'];
	$nom=$_GET['Nom'];
	$idTable=$_GET['idt'];

	// echo($id." rr ".$nom." ee ".$idTable );
	// echo($separation2);
	
	$ListeContactC->supprimerAdresseListeContact($id,$nom);
	header('Location: Consulter@ListeContact.php?id='.$idTable);
}

?>