<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=bweb;charset=utf8", "root", "");
if (isset($_POST['ajouter'],$_POST['emailNewsInput']))
{
    $addn = $bdd->prepare('INSERT INTO abonne_newsletter(Email) VALUES(?)');
    $addn->execute(array($_POST['emailNewsInput']));
}
?>
<script>
history.back();
</script>