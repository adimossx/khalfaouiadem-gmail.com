<?PHP
include "configPoint.php";
class PointsClientsC {
	
function afficherPointsClients(){
			$sql="SElECT * From PointsClients";
			$db = config97::getConnexion();
			try{
			$liste=$db->query($sql);
			return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
	}

function AjouterPointsClients($idProduit,$idClient){
		$sql="Select PointProd From pointsproduits where idProd=$idProduit ";
		$db = config97::getConnexion();
		$liste=$db->query($sql);
		$nbpoint=0;
		foreach($liste as $rr)
		{
		 	$nbpoint=$rr['PointProd'];
		}
		echo $nbpoint;
		$sql="UPDATE PointsClients SET PointProdC=PointProdC+$nbpoint WHERE idClient=:idc";
		$db = config97::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':idc',$idClient);
		$req->execute();	
	}

	function DiminuerPointsClients($idProduit,$idClient){
		$sql="Select PointProd From pointsproduits where idProd=$idProduit ";
		$db = config97::getConnexion();
		$liste=$db->query($sql);
		$nbpoint=0;
		foreach($liste as $rr)
		{
		 	$nbpoint=$rr['PointProd'];
		}
		echo $nbpoint;
		$sql="UPDATE PointsClients SET PointProdC=PointProdC-$nbpoint WHERE idClient=:idc";
		$db = config97::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':idc',$idClient);
		$req->execute();	
	}
	
	function affecterPoints($somme,$idClient){
		$sql="UPDATE `pointsclients` SET `PointProdC`= `PointProdC` + '$somme' WHERE `IDClient`='$idClient'";
		
		$db = config97::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
            $s=$req->execute();
			
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();

        }
		
	}
	function afficherPointsClient($idClient){
			$sql="SELECT  `PointProdC` FROM `pointsclients` WHERE `IDClient`='$idClient' ";
			$db = config97::getConnexion();
			try{
			$liste=$db->query($sql);
			foreach ($liste as $key ) {
				$x=$key['PointProdC'];
			}
			return $x;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
	}

	function a1(){
			$sql="select COUNT(`IDClient`) as hechem from pointsclients where `PointProdC`<500  ";
			$db = config97::getConnexion();
			try{
			$liste=$db->query($sql);
			foreach ($liste as $key ) {
				$x=$key['hechem'];
			}
			return $x;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
	}
	function a2(){
			$sql="select COUNT(`IDClient`) as hechem from pointsclients where `PointProdC`>500 and `PointProdC`<1000  ";
			$db = config97::getConnexion();
			try{
			$liste=$db->query($sql);
			foreach ($liste as $key ) {
				$x=$key['hechem'];
			}
			return $x;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
	}
	function a3(){
			$sql="select COUNT(`IDClient`) as hechem from pointsclients where `PointProdC`>1000 and `PointProdC`<2000  ";
			$db = config97::getConnexion();
			try{
			$liste=$db->query($sql);
			foreach ($liste as $key ) {
				$x=$key['hechem'];
			}
			return $x;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
	}
	function a4(){
			$sql="select COUNT(`IDClient`) as hechem from pointsclients where `PointProdC`>2000  ";
			$db = config97::getConnexion();
			try{
			$liste=$db->query($sql);
			foreach ($liste as $key ) {
				$x=$key['hechem'];
			}
			return $x;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
	}


}

?>
