<?PHP
$bdd = new PDO('mysql:host=127.0.0.1;dbname=bweb', 'root', '');
require('recaptcha/autoload.php');
include "../../../entities/client.php";
include "../../../core/ClientC.php";

if(isset($_POST['g-recaptcha-response'])) {
   $recaptcha = new \ReCaptcha\ReCaptcha('6LcQfqUUAAAAABkANm5fvCE8nrxKFXXBlcAdghkU');
   $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
   if ($resp->isSuccess()) {
      var_dump('Captcha Valide');
      $file_store="upload/unknown.png";
      if(isset($_POST["nom"]) && !empty($_POST["nom"]))
      {
         $Client1=new Client("C".strtotime(date('H:i:s')),$_POST['username'],$_POST['email'],$_POST['select_City'],$file_store,$_POST['password'],$_POST['phone'],$_POST['nom'],$_POST['prenom'],date("Y-m-d"),$_POST['profession']);
         $Client1C=new ClientC();
         $Client1C->ajouterClient($Client1);

         $longueurKey = 15;
                     $key = "";
                     for($i=1;$i<$longueurKey;$i++) {
                        $key .= mt_rand(0,9);
                     }
         $insertmbr = $bdd->prepare("UPDATE client set confirmkey=? where mail=?");

         $insertmbr->execute(array($key,$_POST['email']));

         $header="MIME-Version: 1.0\r\n";
         $header.='From:"Enactus ICT"<no_reply@enactusict.tn>'."\n";
         $header.='Content-Type:text/html; charset="uft-8"'."\n";
         $header.='Content-Transfer-Encoding: 8bit';
         $message='
         <html>
            <body>
               <p>
                  Bonjour '.$_POST['nom'].' '.$_POST['prenom'].',
                  
                  Merci de bien vouloir comfirmer votre adresse mail:

               </p>     
               <div align="center">
                  <a href="http://127.0.0.1/integration/projet-web/projet-web/projet%20web/core/confirmation.php?pseudo='.urlencode($_POST['username']).'&key='.$key.'">Confirmez votre compte !</a>
               </div>
               Thanks!
            </body>
         </html>
         ';
         mail($_POST['email'], "Confirmation de compte Enactus ICT", $message, $header);

         header('Location: login.php');
      }
      else
      {
         echo "NOT";
      //header('Location: CClients.php');
      }
   } 
   
   else {
      echo '<script> window.history.back()  </script>';
   }
 } 
 
 else {
   var_dump('Captcha non rempli');
 }


?>