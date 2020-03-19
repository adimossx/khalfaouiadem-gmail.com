<?PHP
include "configPoint.php";
class PointsProduitsC {

function ajouterPointsProduits($PointsProduits){
		$sql="INSERT INTO PointsProduits ( idProd , PointProd ) VALUES(:ip , :pp)";
		$db = config12::getConnexion();
		try{
		$req=$db->prepare($sql);
		$idprod=$PointsProduits->getIdProd();
		$pointprod=$PointsProduits->getPointsProd();
		$req->bindValue(':ip',$idprod);
		$req->bindValue(':pp',$pointprod);
		$req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
function afficherPointsProduits(){
			$sql="SElECT * From PointsProduits";
			$db = config12::getConnexion();
			try{
			$liste=$db->query($sql);
			return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
	}

function supprimerPointsProduits($id){
		$sql="DELETE FROM PointsProduits where id= :id";
		$db = config12::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
			$req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

function modifierPointsProduits($PointsProduits,$id){
		$sql="UPDATE PointsProduits SET idProd=:idp , PointProd=:pp WHERE id=:id";
		$db = config12::getConnexion();
		try{		
		$req=$db->prepare($sql);
		$idprod=$PointsProduits->getIdProd();
		$pointprod=$PointsProduits->getPointsProd();
		print_r($PointsProduits);
		$req->bindValue(':id',$id);
		$req->bindValue(':idp',$idprod);
		$req->bindValue(':pp',$pointprod);
		$req->execute();
        }
		catch (Exception $e)
		{
            echo " Erreur ! ".$e->getMessage();
        }
		
	}


	function recupererPointsProduits($id){
		$sql="SELECT * from PointsProduits where id=$id";
		$db = config12::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererPointsProduit($refProduit){
		$sql=" SELECT `PointProd` FROM `pointsproduits` WHERE `idProd`='$refProduit' ";
		$db = config12::getConnexion();
		try{
		$liste=$db->query($sql);
		$h=0;
		foreach ($liste as $row) {
			$h=$row['PointProd'];
		}
		if($h==0)
		{
			return 0;
		}
		return $h ;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>