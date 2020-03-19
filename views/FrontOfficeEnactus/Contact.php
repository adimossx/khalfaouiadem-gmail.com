<?php

var_dump($_POST);

if(isset($_POST['Name'],$_POST['Email'],$_POST['Message'],$_POST['submit']))
{
    $nom=$_POST['Name'];
    $mail=$_POST['Email'];
    $message="Mail Envoyé par <strong>".$nom."</strong>,Adresse Mail: <strong>".$mail."</strong> "."<br>"."Le Message :"."<br>".$_POST['Message'];
    
$mailEnv="aminegongiesprit@gmail.com";
$header="MIME-Version: 1.0\r\n";
$header.='From:"'.$nom.'"<'.$mail.'>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$obj="Mail envoyé Avec le Formulaire de Contact";

mail($mailEnv, $obj , $message, $header);

// echo "<br>";
// echo $nom;
// echo "<br>";
// echo $mail;
// echo "<br>";
// echo $message;
// echo "<br>";
// echo $mailEnv;
// echo "<br>";
// echo $header;
// echo "<br>";

echo ("<script> history.back(); </script>");

}
?>